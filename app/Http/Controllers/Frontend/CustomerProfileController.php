<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;

class CustomerProfileController extends Controller
{
    public function index($slug){
        $order = Order::where('customer_id',Auth::guard('customer')->user()->id)->latest('id')->get();
        $orders = Order::where('customer_id',Auth::guard('customer')->user()->id)->latest('id')->get();
        $complete = Order::where('status','3')->where('customer_id',Auth::guard('customer')->user()->id)->latest('id')->get();
        $return = Order::where('status','3')->where('customer_id',Auth::guard('customer')->user()->id)->latest('id')->get();
        $cancle = Order::where('status','3')->where('customer_id',Auth::guard('customer')->user()->id)->latest('id')->get();
        $customer=Customer::where('slug',$slug)->first();
        return view('frontend.customer.profile',compact(['customer','order','orders','complete','return','cancle']));
    }
}
