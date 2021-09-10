<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Redirect;
use Session;
use URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function home(){
        $banners = Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->limit('3')->get();
        $products = Product::where('status','active')->paginate(10);
        $categories = Category::where(['status'=>'active','is_parent'=>'1'])->orderBy('id','DESC')->get();
        $brands = Brand::where('status','active')->orderBy('id','DESC')->get();
        $promo_banner = Banner::where(['status'=>'active','condition'=>'promo'])->orderBy('id','DESC')->first();

        //Best Selling
        $items = DB::table('product_orders')->select('product_id',DB::raw('COUNT(product_id) as count'))->groupBy('product_id')->orderBy("count",'desc')->get();
        $product_ids = [];
        foreach($items as $item){
            array_push($product_ids,$item->product_id);
        }
        $best_selling = Product::where('id',$product_ids)->limit(4)->get();
        //Best sales product
        $best_sales = Product::where('status','active')->orderBy('offer_price','ASC')->limit(4)->get();
        //new products
        $product = Product::where('status','active')->orderBy('id','DESC')->limit(4)->get();
        //top products
        $top_products = Product::where('status','active')->orderBy('price','DESC')->limit(4)->get();
       
        return view('frontend.index')->with(compact('banners','promo_banner','categories','products','brands','best_sales','product','top_products','best_selling'));
    }
    public function shop(){
        $products = Product::where('status','active')->paginate(9);
        $cats = Category::where(['status' => 'active','is_parent' =>'1'])->orderBy('title','ASC')->get();
        return view('frontend.pages.product.shop')->with(compact('products','cats'));
    }
    public function about(){
        return view('frontend.pages.about');
    }
    public function contact(){
        return view('frontend.pages.contact');
    }
    public function blog(){
        return view('frontend.pages.blog');
    }
    public function productCategory(Request $request ,$slug){
        $category = Category::where(['status'=>'active','is_parent'=>'1'])->orderBy('id','DESC')->get();
        $categories = Category::with(['products'])->where('slug',$slug)->first();
        // return $request->all();
        $sort ='';
        if ($request->sort != null) {
            $sort = $request->sort;
        }
        if ($categories==null) {
            return view('error.404');
        }else
        {
            if ($sort=='priceAsc') {
                $products = Product::where(['status'=>'active','cat_id' => $categories->id])->orderBy('offer_price','ASC')->paginate(12);
            }elseif($sort=='priceDesc')
            {
                $products = Product::where(['status'=>'active','cat_id' => $categories->id])->orderBy('offer_price','DESC')->paginate(12);
            }elseif($sort=='disAsc')
            {
                $products = Product::where(['status'=>'active','cat_id' => $categories->id])->orderBy('price','ASC')->paginate(12);
            }elseif($sort=='disDesc')
            {
                $products = Product::where(['status'=>'active','cat_id' => $categories->id])->orderBy('price','DESC')->paginate(12);
            }elseif($sort=='titleAsc')
            {
                $products = Product::where(['status'=>'active','cat_id' => $categories->id])->orderBy('title','ASC')->paginate(12);
            }elseif($sort=='titleDesc')
            {
                $products = Product::where(['status'=>'active','cat_id' => $categories->id])->orderBy('title','DESC')->paginate(12);
            }else
            {
                $products = Product::where(['status' => 'active','cat_id'=>$categories->id])->paginate(12); 
            }
        }
        $route = 'product-category';

        // if ($request->ajax()) {
        //     $view = view('frontend.pages.product.single-product')->with(compact('products'))->render();
        //     return response()->json(['html' => $view]);
        // } ajax-load
        return view('frontend.pages.product.product-category')->with(compact(['categories','category','route','products']));
    }
    public function productDetails($slug){
        $product = Product::with('rel_product')->where('slug',$slug)->first();
        if ($product) {
            return view('frontend.pages.product.product-details')->with(compact('product'));
        }else
        {
            return 'Product details not found';
        }
    }
    public function userAuth(){
        Session::put('url.intended',URL::previous());
        return view('frontend.auth.auth');
    }
    public function loginSubmit(Request $request){
        // return $request->all();
        $this->validate($request, [
            'email' => 'email|required|exists:users,email',
            'password' => 'required|min:4',
        ]);
        if (Auth::attempt(['email' => $request->email,'password' =>$request->password, 'status' => 'active'])) {
            Session::put('user',$request->email);
            if (Session::get('url.intended')) {
                return Redirect::to(Session::get('url.intended'));
            }else
            {
                return redirect()->route('/')->with('success','Successfully login');
            }
            
        }else{
            return back()->with('error','Invalid email & password');
        }
    }
    public function registerSubmit(Request $request){
        // return $request->all();
        $this->validate($request, [
            'username' => 'nullable|string',
            'full_name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'min:4|required|confirmed',
        ]);
        $data = $request->all();
        $check = $this->create($data);
        Session::put('user',$data['email']);
        Auth::login($check);
        if ($check) {
            return redirect()->route('/')->with('success','Successfully Register');
        }else
        {
            return back()->with('error',['Please check your credentails']);
        }
    }

    private function create(array $data){
        return User::create([
            'full_name' => $data['full_name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
    public function userLogout(){
        Session::forget('user');
        Auth::logout();
        return redirect()->route('/')->with('success','Successfully Logout');
    }
    public function userDashboard(){
        $user = Auth::user();
        return view('frontend.user.dashboard')->with(compact('user'));
    }
    public function userOrder(){
        $user = Auth::user();
        return view('frontend.user.order')->with(compact('user'));
    }
    public function userAddress(){
        $user = Auth::user();
        return view('frontend.user.address')->with(compact('user'));
    }
    public function userAccount(){
        $user = Auth::user();
        return view('frontend.user.account')->with(compact('user'));
    }
    public function billingAddress(Request $request ,$id){
        // return $request->all();
        $user = User::where('id',$id)->update(['country' => $request->country,'city' => $request->city,'postcode' =>$request->postcode,'address' =>$request->address,'state' =>$request->state]);
        // return $user;
        if ($user) {
            return back()->with('success','Address Successfully updated');
        }else
        {
            return back()->with('error','Something went wrong!');
        }
    }
     public function shippingAddress(Request $request ,$id){
        // return $request->all();
        $user = User::where('id',$id)->update(['scountry' => $request->scountry,'scity' => $request->scity,'spostcode' =>$request->spostcode,'saddress' =>$request->saddress,'sstate' =>$request->sstate]);
        // return $user;
        if ($user) {
            return back()->with('success','Shipping address Successfully updated');
        }else
        {
            return back()->with('error','Something went wrong!');
        }
    }
    public function updateAccount(Request $request ,$id){
        $this->validate($request,[
            'newpassword' => 'nullable|min:4',
            'oldpassword' => 'nullable|min:4',
            'full_name' => 'required|string',
            'username' => 'nullable|string',
            'phone' => 'nullable|min:10',
        ]);
        $hashpassword = Auth::user()->password;

        if ($request->oldpassword==null && $request->newpassword==null) {
            User::where('id',$id)->update(['full_name' =>$request->full_name,'username' => $request->username,'phone' =>$request->phone]);
        }else
        {
            if (\Hash::check($request->oldpassword,$hashpassword)) {
                if (!\Hash::check($request->newpassword, $hashpassword)) {
                    User::where('id',$id)->update(['full_name' =>$request->full_name,'username' => $request->username,'phone' =>$request->phone,'password' =>Hash::make($request->newpassword)]);
                    return back()->with('success', 'Acount successfully updated');
                }else
                {
                    return back()->with('error','New password can not be same with old passwotd');
                }
            }else
            {
                return back()->with('error','Old password does not match');
            }
        }
    }
}
