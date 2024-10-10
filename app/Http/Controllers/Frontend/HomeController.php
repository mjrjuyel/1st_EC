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
        $featured=Product::where('pro_status','1')->where('pro_featured','1')->latest('id')->limit(8)->get();
        $popular=Product::where('pro_status','1')->orderBy('pro_views','DESC')->limit(8)->get();
        $trendy=Product::where('pro_status','1')->where('pro_trendy','1')->latest('id')->limit(8)->get();
        $categoryItem = Category::where('cat_status','1')->latest('id')->get();
        $recentview = Product::where('pro_status','1')->where('pro_views','>=','1')->orderBy('pro_views','DESC')->get();
        // return $recentview;
        return view('frontend.index',compact(['banner','featured','popular','trendy','categoryItem','recentview']));
    }

    // product Views Single
    public function view($slug){
        $sinpro = Product::with(['category','subcat','childcategory','brand'])->where('pro_status','1')->where('pro_slug',$slug)->first();
        Product::where('pro_status','1')->where('pro_slug',$slug)->increment('pro_views');
        $relate = product::where('pro_status','1')->where('sub_category_id',$sinpro->sub_category_id)->latest('id')->get();
        // return $singleproduct;
        return view('frontend.product_view',compact('sinpro','relate'));
    }

    // ===== login and registration

    public function login(){
        return view('frontend.login');
    }

}
