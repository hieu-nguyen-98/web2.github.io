<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class Brandcontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('id','DESC')->get();
        return view('backend.brand.index')->with(compact('brands'));
    }
    public function brandStatus(Request $request){
        if ($request->mode=='true') {
            DB::table('brands')->where('id',$request->id)->update(['status'=>'active']);

        }else
        {
            DB::table('brands')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' =>'nullable:string',
            'photo' => 'required',
            'status' => 'nullable|in:active,inactive',
        ]);
        $data = $request->all();
        $slug = Str::slug($request->title);
        $slug_count = Brand::where('slug',$slug)->count();
        if ($slug_count >0) {
            $slug = time().'-'.$slug;
        }
        $data['slug'] = $slug;
        $status = Brand::create($data);
        if ($status) {
            return redirect()->route('brand.index')->with('success','Brand Successfully create');
        }else
        {
            return back()->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $brand = Brand::find($id);
        if ($brand) {
           return view('backend.brand.edit')->with(compact('brand'));
        }else
        {
            return back()->with('error','Data not found');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if ($brand) {
           $this->validate($request,[
            'title' =>'nullable:string',
            'photo' => 'required',
            'status' => 'nullable|in:active,inactive',
        ]);
        $data = $request->all();
        $status = $brand->fill($data)->save();
        if ($status) {
            return redirect()->route('brand.index')->with('success','Successfully update brand');
        }else
        {
            return back()->with('error','something went wrong!');
        }
        }else
        {
            return back()->with('error','Data not found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $brand = Brand::find($id);
        if ($brand) {
          $status=$brand->delete();
          if ($status) {
              return redirect()->route('brand.index')->with('success','Brand Successfully delete');
          }else
          {
            return back()->with('error','Something went wrong');
          }
        }else
        {
            return back()->with('error','Data not found');
        }
    }
}