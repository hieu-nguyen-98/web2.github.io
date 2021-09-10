<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Shipping;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use Session;
use Cart;
use App\Mail\OrderMail;
use Mail;
use Illuminate\Support\Str;
class CheckoutController extends Controller
{
    public function checkout1(){
        $user = Auth::user();
        return view('frontend.pages.checkout.checkout1')->with(compact('user'));
    }
    public function checkout1Store(Request $request){
        // return $request->all();
        // $this->validate($request,[
        //     'first_name' => 'string|required',
        //     'last_name' => 'string|required',
        //     'email' => 'email|required|exists:users,email',
        //     'phone' => 'string|required',
        //     'address' => 'string|required',
        //     'city' => 'string|required',
        //     'country' => 'string|required',
        //     'state' => 'string|nullable',
        //     'postcode' => 'string|required',
        //     'note' => 'string|required',
        //     'sfirst_name' => 'string|required',
        //     'slast_name' => 'string|required',
        //     'sphone' => 'string|required',
        //     'saddress' => 'string|required',
        //     'scity' => 'string|required',
        //     'scountry' => 'string|required',
        //     'sstate' => 'string|nullable',
        //     'spostcode' => 'string|required',
        //     'sub_total' => 'required|numeric',
        //     'total_amount' => 'required|numeric',
        // ]);
        Session::put('checkout',[
            'first_name' => $request->first_name,
            'last_name' =>  $request->last_name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'country' => $request->country,
            'city' => $request->city,
            'state' => $request->state,
            'postcode' => $request->postcode,
            'note' => $request->note,
            'sfirst_name' => $request->sfirst_name,
            'slast_name' =>  $request->slast_name,
            'semail' => $request->semail,
            'saddress' => $request->saddress,
            'scountry' => $request->scountry,
            'scity' => $request->scity,
            'sphone' => $request->sphone,
            'sstate' => $request->sstate,
            'spostcode' => $request->spostcode,
            'sub_total' =>  $request->sub_total,
            'total_amount' => $request->total_amount,
        ]);
        $shippings = Shipping::where('status','active')->orderBy('shipping_address','ASC')->get();

        return view('frontend.pages.checkout.checkout2')->with(compact('shippings'));
    }
    public function checkout2Store(Request $request){
        // return $request->all();
        $this->validate($request,[
            'delivery_charge' => 'required|numeric',
        ]);
        Session::push('checkout',[
            'delivery_charge' => $request->delivery_charge,

        ]);
        return view('frontend.pages.checkout.checkout3');
    }
    public function checkout3Store(Request $request){
        // return $request->all();
        $this->validate($request,[
            'payment_method' => 'string|required',
            'payment_status' => 'string|in:paid,unpaid',
        ]);
        Session::push('checkout',[
            'payment_method' => $request->payment_method,
            'payment_status' => 'unpaid',
        ]);
        // return Session::get('checkout');
        return view('frontend.pages.checkout.checkout4');
    }
    public function checkoutStore(){
       $order = new Order();
       $order['user_id'] = auth()->user()->id;
       $order['order_number'] = Str::upper('ORD-' .Str::random(6));
       $order['sub_total'] = Session::get('checkout')['sub_total'];
       if (Session::has('coupon')) {
           $order['coupon'] = Session::get('coupon')['value'];
       }else{
        $order['coupon'] = 0;
       }
       
       $order['total_amount'] = (float)str_replace(',','',Session::get('checkout')['sub_total'])+ Session::get('checkout')[0]['delivery_charge'] - $order['coupon'];
       $order['payment_method'] = Session::get('checkout')['1']['payment_method'];
       $order['payment_status'] = Session::get('checkout')['1']['payment_status'];
       $order['condition'] = 'pending';
       $order['delivery_charge'] = Session::get('checkout')['0']['delivery_charge'];
       $order['first_name'] = Session::get('checkout')['first_name'];
       $order['last_name'] = Session::get('checkout')['last_name'];
       $order['email'] = Session::get('checkout')['email'];
       $order['phone'] = Session::get('checkout')['phone'];
       $order['country'] = Session::get('checkout')['country'];
       $order['city'] = Session::get('checkout')['city'];
       $order['address'] = Session::get('checkout')['address'];
       $order['state'] = Session::get('checkout')['state'];
       $order['postcode'] = Session::get('checkout')['postcode'];

       $order['note'] = Session::get('checkout')['note'];
       $order['sfirst_name'] = Session::get('checkout')['sfirst_name'];
       $order['slast_name'] = Session::get('checkout')['slast_name'];
       $order['semail'] = Session::get('checkout')['semail'];
       $order['scountry'] = Session::get('checkout')['scountry'];
       $order['sphone'] = Session::get('checkout')['sphone'];
       $order['scity'] = Session::get('checkout')['scity'];
       $order['saddress'] = Session::get('checkout')['saddress'];
       $order['spostcode'] = Session::get('checkout')['spostcode'];
       $order['sstate'] = Session::get('checkout')['sstate'];
       
       $status = $order->save();

       foreach(Cart::instance('shopping')->content() as $item){
        $product_id[] = $item->id;
        $product = Product::find($item->id);
        $quantity = $item->qty;
        $order->products()->attach($product,['quantity'=>$quantity]);
       }

       if ($status) {
        Mail::to($order['email'])->bcc($order['semail'])->cc('nguenvanhieu250698@gmail.com')->send(new OrderMail($order));
        // dd('mail is send');
        Cart::instance('shopping')->destroy();
        Session::forget('coupon');
        Session::forget('checkout');

           return redirect()->route('complete',$order['order_number']);
       }else{
        return redirect()->route('checkout1')->with('error','Please try again');
       }
       
    }
    public function complete($order){
        $order = $order;
        return view('frontend.pages.checkout.complete')->with(compact('order'));
    }
}
