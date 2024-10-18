<?php

namespace App\Http\Controllers\FrontEnd;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Mail\NvoiceOrderMail;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\PaymentGatewayBd;
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

        if($request->paymentOption == 'COD'){
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
                    'order_id'=>rand(1000,10000),
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

            Mail::to($order->c_email)->send(new NvoiceOrderMail($order));
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
        elseif($request->paymentOption == 'DigitalPay'){
            $amarpay =PaymentGatewayBd::first();
            if($amarpay->store_id == null){
                Session::flash('error','Payment Ooption Is Not set!');
                 return redirect()->back();
            }
            else{
                if($amarpay->status == 0){
                    $url = "https://sandbox.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"
                }
                else{
                    $url = "https://secure.aamarpay.com/jsonpost.php"; // for Live Transection use "https://secure.aamarpay.com/jsonpost.php"
                }
                    $tran_id = "test".rand(1111111,9999999);//unique transection id for every transection
                    $currency= "BDT"; //aamarPay support Two type of currency USD & BDT  
                    $amount = Cart::total();   //10 taka is the minimum amount for show card option in aamarPay payment gateway
                    //For live Store Id & Signature Key please mail to support@aamarpay.com
                    $store_id = $amarpay->store_id;
                    $signature_key = $amarpay->store_id; 
                    $curl = curl_init();
                    curl_setopt_array($curl, array(
                    CURLOPT_URL => $url,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_POSTFIELDS =>'{
                        "store_id": "'.$store_id.'",
                        "tran_id": "'.$tran_id.'",
                        "success_url": "'.route('success').'",
                        "fail_url": "'.route('fail').'",
                        "cancel_url": "'.route('cancel').'",
                        "amount": "'.$amount.'",
                        "currency": "'.$currency.'",
                        "signature_key": "'.$amarpay->signature_key.'",
                        "desc": "Product Price",
                        "cus_name": "'.$request->c_name.'",
                        "cus_email": "'.$request->c_email.'",
                        "cus_add1": "'.$request->c_address.'",
                        "cus_add2": "Rajshahi",
                        "cus_city": "Dhaka",
                        "cus_state": "Dhaka",
                        "cus_postcode": "'.$request->c_zipcode.'",
                        "cus_country": "'.$request->c_country.'",
                        "cus_phone": "+'.$request->c_phone.'",
                        "type": "json"
                    }',
                    CURLOPT_HTTPHEADER => array(
                        'Content-Type: application/json'
                    ),
                    ));
    
                    $response = curl_exec($curl);
    
                    curl_close($curl);
                    // dd($response);
                    $responseObj = json_decode($response);
                        if(isset($responseObj->payment_url) && !empty($responseObj->payment_url)) {
                            // dd($paymentUrl);
                            return redirect()->away($responseObj->payment_url);
                        }
                        else{
                            echo $response;
                        }
            }

        }

    }
    // if payment is fail or success
    public function success(Request $request){
        
        if(Session::has('coupon') && Session::get('coupon')['after_discount'] >= 500){
            $order =Order::create([
                'customer_id'=>Auth::guard('customer')->user()->id,
                'c_name'=>$request['cus_name'],
                'c_phone'=>$request['cus_phone'],
                'c_email'=>$request['cus_email'],
                'c_country'=>$request['cus_country'],
                'c_address'=>$request['cus_add1'],
                'c_zipcode'=>$request['cus_zipcode'],
                'payment_type'=>$request['payment_type'],
                'shipping_charge'=>0,
                'tax'=>Cart::tax(),
                'subtotal'=>Cart::subtotal(),
                'total'=>Cart::total(),
                'coupon_code'=>Session::get('coupon')['name'],
                'coupon_discount'=>Session::get('coupon')['discount'],
                'coupon_after_discount'=>Session::get('coupon')['after_discount'],
                'order_id'=>rand(100,1000),
                'status'=>1,
                'date'=>date('d'),
                'month'=>date('m'),
                'year'=>date('y'),
                'created_at'=>Carbon::now(),
            ]);
        }
        else{
            $order =Order::create([
                'customer_id'=>Auth::guard('customer')->user()->id,
                'c_name'=>$request['cus_name'],
                'c_phone'=>$request['cus_phone'],
                'c_email'=>$request['cus_email'],
                'c_country'=>$request['cus_add2'],
                'c_address'=>$request['cus_add1'],
                'c_zipcode'=>$request['cus_zipcode'],
                'payment_type'=>$request['payment_type'],
                'shipping_charge'=>0,
                'tax'=>Cart::tax(),
                'subtotal'=>Cart::subtotal(),
                'total'=>Cart::total(),
                'order_id'=>rand(100,1000),
                'status'=>1,
                'date'=>date('d'),
                'month'=>date('m'),
                'year'=>date('y'),
                'created_at'=>Carbon::now(),
            ]);
        }

        Mail::to($order->c_email)->send(new NvoiceOrderMail($order));
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
    public function fail(Request $request){
        return $request;
    }

    public function cancel(){
        return 'Canceled';
    }
}
