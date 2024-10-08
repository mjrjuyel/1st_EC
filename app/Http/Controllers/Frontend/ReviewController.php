<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WishList;
use App\Models\Review;
use Carbon\Carbon;
use Session;

class ReviewController extends Controller
{
    // product wish list
    public function wishlist($id){
        $check=WishList::where('product_id',$id)->where('customer_id',Auth::guard('customer')->user()->id)->first();
        if($check){
            session()->flash('error', 'Already have added this product!');
            return redirect()->back();
        }else{
            $add =WishList::create([
                'product_id'=>$id,
                'customer_id'=>Auth::guard('customer')->user()->id,
                'created_at'=>carbon::now(),
            ]);
            if($add){
                session()->flash('success','Product Added To the wishlist!');
                return redirect()->back();
            }
        }
    }

    public function wishlistall(){
        $wishlist = WishList::with(['product','customer'])->where('customer_id',Auth::guard('customer')->user()->id)->get();
        // return $wishlist;
        return view('frontend.wishlist',compact('wishlist'));
    }

    public function wishRemove($id){
        $delete =WishList::where('id',$id)->where('customer_id',Auth::guard('customer')->user()->id)->delete();
        if($delete){
            Session::flash('error','Remove Successfully');
            return redirect()->back();
        }
    }

    public function wishDelete(){
        $delete =WishList::where('customer_id',Auth::guard('customer')->user()->id)->delete();
        if($delete){
            Session::flash('error','Delete All WishList Items!');
            return redirect()->route('.');
        }
    }

    public function addReview(Request $request){
        $pro_id=$request['product_id'];
        $product = Product::where('pro_status','1')->where('id',$pro_id->$id)->first();
        $insert=Review::create([
            'review'=>$request['comment'],
            'star'=>$request['rate_value'],
            'product_id'=>$id,
            'rev_date'=>date('d'),
            'rev_date'=>date('m'),
            'rev_date'=>date('y'),
            'customer_id'=>Auth::guard('customer')->user()->id,
            'created_at'=>Carbon::now(),
        ]);
        return $insert;
    }
}
