<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Product;

class HomeController extends Controller
{
    // root function s
    public function index(){
        // $category = Category::with(['subcategory','childcategory'])->where('cat_status','1')->latest('id')->get();
        $banner = Product::where('pro_status','1')->where('pro_slider','1')->latest()->first();
        // return $banner;
        return view('frontend.index',compact('banner'));
    }

    public function view($slug){
        $sinpro = Product::with(['category','subcat','childcategory','brand'])->where('pro_status','1')->where('pro_slug',$slug)->first();
        $relate =product::where('sub_category_id',$sinpro->sub_category_id)->where('pro_status','1')->latest('id')->get();
        // return $singleproduct;
        return view('frontend.product_view',compact('sinpro','relate'));
    }

    // ===== login and registration

    public function login(){
        return view('frontend.login');
    }

}
