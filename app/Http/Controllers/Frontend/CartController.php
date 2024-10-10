<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use Cart;
use Session;

class CartController extends Controller
{
    public function cartAdd(Request $request){

        $product=Product::where('pro_status','1')->where('id',$request->id)->first();
        // $check=Cart::where('id',$product->id)->where('customer_id',Auth::guard('customer')->user()->id)->first();
        // if($check){
        //     session()->flash('error','This Product Already Added To Cart!');
        //     return redirect()->back();
        // }
        Cart::add([
            'id'=>$request['id'],
            'name'=>$product->pro_title,
            'qty'=>$request['quantity'],
            'price'=>$request['price'],
            'options'=>[
                'size'=>$request['size'],
                'color'=>$request['color'],
                'thumbnail'=>$product->pro_thumbnail,
                'customer_id'=>Auth::guard('customer')->user()->id,
            ]
        ]);

        session()->flash('success','product add to cart');
        return redirect()->back();
    }

    public function cartAll(){
        $allcart = Cart::content();
        // $totalcount = 0;
        // // return $allcart;
        // foreach($allcart as $item){
        //     $totalcount +=$item->qty;
        // }
        // return $totalcount;
        return view('frontend.cart',compact('allcart'));
    }

    // remove product from cart
    public function remove($id){
        $remove= Cart::remove($id);
        Session::flash('error','Product Remove From Cart!');
        return redirect()->back();
    } 

    public function updateqty($rowId,$qty){
        $update = Cart::update($rowId, ['qty' => $qty]);
        // return $update;
        // Session::flash('success','cart update successfully!');
        return response()->json();
    } 

    public function updatesize($rowId,$size){
        $pro = Cart::get($rowId);
        $color = $pro->options->color;
        $thumb = $pro->options->thumbnail;
        $custo_id = $pro->options->customer_id;
        $update = Cart::update($rowId, ['options' => [
            'size'=>$size,
            'color'=>$color,
            'thumbnail'=>$thumb,
            'customer_id'=>$custo_id,
        ]]);
        // return $update;
        // Session::flash('success','cart update successfully!');
        return response()->json();
    }
    public function updateColor($rowId,$color){
        $pro = Cart::get($rowId);
        $size = $pro->options->size;
        $thumb = $pro->options->thumbnail;
        $custo_id = $pro->options->customer_id;
        $update = Cart::update($rowId,['options'=>[
            'size'=>$size,
            'color'=>$color,
            'thumbnail'=>$thumb,
            'customer_id'=>$custo_id,
        ]]);
        return response()->json();
    }

    public function destroyCart(){
        $destroy = Cart::destroy();
        Session::flash('error','All cart Item Has Been Removed!');
        return response()->json();
    }
}
