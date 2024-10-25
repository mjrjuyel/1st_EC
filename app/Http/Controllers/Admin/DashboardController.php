<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Subcategory;
use App\Models\Warehouse;
use App\Models\Product;
use App\Models\Customer;

class DashboardController extends Controller
{
    public function index(){
        $adminUser = User::all();
        $totalOrder = Order::get();
        $totalBrand = Brand::where('brand_status','1')->get();
        $totalCategory = Category::where('cat_status','1')->get();
        $totalSubcategory = Subcategory::where('subcat_status','1')->get();
        $totalProduct = Product::where('pro_status','1')->get();
        $totalWarehouse = Warehouse::where('wh_status','1')->get();
        $totalCustomer = Warehouse::where('wh_status','1')->get();
        $recentOrder_detail = OrderDetail::with(['order'])->latest('id')->limit(10)->get();
        // return $recentOrder_detail;
        return view('admin.dashboard.index',compact(['adminUser','totalOrder','totalBrand','totalCategory','totalSubcategory','totalProduct','recentOrder_detail','totalWarehouse','totalCustomer']));
    }

    public function customerAll(){
        $customer = Customer::all();
        return view('admin.admin.customer',compact('customer'));
    }
}
