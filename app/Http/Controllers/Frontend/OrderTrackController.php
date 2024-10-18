<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderDetail;
use Session;

class OrderTrackController extends Controller
{
    public function track(Request $request){
        $orderId =$request['order_id'];
        $order = Order::where('customer_id',Auth::guard('customer')->user()->id)->where('order_id',$orderId)->first();
        if($order){
            $order_detail = OrderDetail::where('order_id',$order->id)->latest('id')->get();
            return view('frontend.customer.trackorder',compact(['order','order_detail']));
        }
        else{
            Session::flash('error','Order id Is Not Matching');
            return view('frontend.customer.profile');
        }
    }
}
