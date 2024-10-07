<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\WishList;
use Carbon\Carbon;

class ReviewController extends Controller
{
    // product wish list
    public function wishlist($id){
        $check=WishList::where('product_id',$id)->where('customer_id',Auth::guard('customer')->user()->id)->first();
        if($check){
            session()->flash('error', 'Already have added this product!');
            return redirect()->back();
        }else{
            $add =Wishlist::create([
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
}
