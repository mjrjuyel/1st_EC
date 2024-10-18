<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use App\Models\Product;
use App\Models\Brand;

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
        $mensCatProduct = Category::with('products')->where('cat_status','1')->where("cat_title","men's")->first();
        $womensCatProduct = Category::with('products')->where('cat_status','1')->where("cat_title","women's")->first();
        $randomCatProduct = Category::with('products')->where('cat_status','1')->inRandomOrder()->where('cat_title','!=',"men's")->where('cat_title','!=',"women's")->first();
        $recentview = Product::where('pro_status','1')->where('pro_views','>=','1')->orderBy('pro_views','DESC')->get();
        $todaydeal = Product::where('pro_status','1')->where('pro_today_deal','1')->latest('id')->get();
        // return $randomCatProduct;
        return view('frontend.index',compact(['banner','featured','popular','trendy','categoryItem','recentview','mensCatProduct','womensCatProduct','randomCatProduct','todaydeal']));
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

    //category wise product view

    public function categoryProduct($id){
        $categoryone=Category::where('id',$id)->first();
        $subcat = SubCategory::where('subcat_status','1')->where('cat_id',$id)->latest('id')->get();
        $brand = Brand::where('brand_status','1')->latest('id')->get();
        $products =Product::where('pro_status','1')->where('category_id',$id)->latest('id')->simplePaginate(50);
        $ranproducts =Product::where('pro_status','1')->inRandomOrder()->limit('10')->latest('id')->get();
        // return $products;
        return view('frontend.product.category_shop',compact(['categoryone','subcat','brand','products','ranproducts']));
    }

    public function subCategoryProduct($id){
        $subcat=SubCategory::with('category')->where('id',$id)->first();
        $childcat = ChildCategory::where('child_cat_status','1')->where('subcat_id',$id)->latest('id')->get();
        $brand = Brand::where('brand_status','1')->latest('id')->get();
        $products =Product::where('pro_status','1')->where('sub_category_id',$id)->latest('id')->simplePaginate(50);
        $ranproducts =Product::where('pro_status','1')->inRandomOrder()->limit('10')->latest('id')->get();
        return view('frontend.product.subcategory_shop',compact(['childcat','subcat','brand','products','ranproducts']));
    }

}
