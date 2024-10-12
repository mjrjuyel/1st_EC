<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use Carbon\Carbon;
use Cart;
use Session;

class CheckoutController extends Controller
{
    public function checkoutAll(){
        $allcheckpro = Cart::content();
        return view('frontend.checkout',compact('allcheckpro'));
    }

    // couppon Apply
    public function couponApply(Request $request){
        $check = Coupon::Where('coupon_code',$request->coupon)->first();
        if($check){
            if(date('d-m-y',strtotime(date('d-m-y')) <= date('d-m-y',strtotime($check->valid_date)))){
                Session::put('coupon',[
                    'name'=>$request->coupon,
                    'discount'=>$check->coupon_amount,
                    'after_discount'=>cart::subtotal() - $check->coupon_amount
                ]);
            Session::flash('success','Coupon Code Added!');
            return redirect()->back();
            }
            else{
                Session::flash('errror','Coupon Date Is Invalid!');
            return redirect()->back();
            }
        }
        // return ;
    }

    public function couponRemove(){
        Session::forget('coupon');
        Session::flash('success','Coupon Removed');
        return redirect()->back();
    }

    // =========  =  Order place
    public function OrderPlace(Request $request){

        $request->validate([
            'c_name'=>'required',
            'c_phone'=>'required',
            'c_address'=>'required',
            'paymentOption'=>'required',
        ]);

        if(Session::has('coupon') && Session::get('coupon')['after_discount'] >= 500){
            $order =Order::create([
                'customer_id'=>Auth::guard('customer')->user()->id,
                'c_name'=>$request['c_name'],
                'c_phone'=>$request['c_phone'],
                'c_email'=>$request['c_email'],
                'c_country'=>$request['c_country'],
                'c_address'=>$request['c_address'],
                'c_zipcode'=>$request['c_zipcode'],
                'payment_type'=>$request['paymentOption'],
                'shipping_charge'=>0,
                'tax'=>Cart::tax(),
                'subtotal'=>Cart::subtotal(),
                'total'=>Cart::total(),
                'coupon_code'=>Session::get('coupon')['name'],
                'coupon_discount'=>Session::get('coupon')['discount'],
                'coupon_after_discount'=>Session::get('coupon')['after_discount'],
                'order_id'=>rand(100,1000),
                'date'=>date('d'),
                'month'=>date('m'),
                'year'=>date('y'),
                'created_at'=>Carbon::now(),
            ]);
        }
        else{
            $order =Order::create([
                'customer_id'=>Auth::guard('customer')->user()->id,
                'c_name'=>$request['c_name'],
                'c_phone'=>$request['c_phone'],
                'c_email'=>$request['c_email'],
                'c_country'=>$request['c_country'],
                'c_address'=>$request['c_address'],
                'c_zipcode'=>$request['c_zipcode'],
                'payment_type'=>$request['paymentOption'],
                'shipping_charge'=>0,
                'tax'=>Cart::tax(),
                'subtotal'=>Cart::subtotal(),
                'total'=>Cart::total(),
                'order_id'=>rand(100,1000),
                'date'=>date('d'),
                'month'=>date('m'),
                'year'=>date('y'),
                'created_at'=>Carbon::now(),
            ]);
        }
        // dd($insert);
        $content = Cart::content();
        // get order id Number
        $orderId = $order->id;

        // Order Detail Insert 
       foreach($content as $content){
        $detail = OrderDetail::create([
            'order_id'=>$orderId,
            'product_id'=>$content->id,
            'product_name'=>$content->name,
            'product_price'=>$content->price,
            'product_qty'=>$content->qty,
            'product_color'=>$content->options->color,
            'product_size'=>$content->options->size,
            'product_subtotal'=>$content->price * $content->qty,
            'created_at'=>Carbon::now(),
        ]);
       }

        if($order){
            Cart::destroy();
            if(Session::has('coupon')){
                Session::forget('coupon');
            }
            Session::flash('success','Order Has been Placed!');
            return redirect()->route('.');
        }
        else{
            Session::flash('error','Order faild To palce !');
            return redirect()->back();
        }
    }
}
