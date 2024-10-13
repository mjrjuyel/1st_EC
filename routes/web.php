<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// ====== Frontend Controller

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ReviewController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CheckoutController;

// Customer Auth Controller
use App\Http\Controllers\CustomerAuth\LoginController;
use App\Http\Controllers\CustomerAuth\RegisterController;

// ======Backend Controller 
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\ChildCategoryController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\WarehouseController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ---------------------============= front end controller =========

Route::get('/product',function(){
    return view('frontend.product_view');
});

Route::get('/',[HomeController::class,'index'])->name('.');
Route::get('/product/{slug}',[HomeController::class,'view'])->name('product');

// ======category related prodct view 
Route::get('/category/product/{id}',[HomeController::class,'categoryProduct'])->name('category.product');
Route::get('/category/subcategory/product/{id}',[HomeController::class,'subCategoryProduct'])->name('category.subcategory.product');

// Customer login Route
Route::get('/customer/login',[LoginController::class,'showLoginForm'])->name('customer.login');
Route::post('/customer/login/insert',[LoginController::class,'login'])->name('customer.login.insert');
Route::get('/customer/register',[RegisterController::class,'registerForm'])->name('customer.register');
Route::post('/customer/register/insert',[RegisterController::class,'register'])->name('customer.register.insert');

Route::middleware('auth.customer')->group(function(){
    // ===== logout Route
    Route::post('/customer/logout',[LoginController::class,'logout'])->name('customer.logout');
    Route::get('/customer/profile',function(){
        return "this is profile";
    })->name('customer.profile');

    // ======= wish list 
    Route::get('product/wishlist/{id}',[ReviewController::class,'wishlist'])->name('product.wishlist');
    Route::get('wishlist',[ReviewController::class,'wishlistAll'])->name('wishlist');
    Route::get('remove/wishlist/{id}',[ReviewController::class,'wishRemove'])->name('remove.wishlist');
    Route::get('delete/wishlist',[ReviewController::class,'wishDelete'])->name('delete.wishlist');
    // Product Review 
    Route::post('product/review/add',[ReviewController::class,'addReview'])->name('product.review.add');
    // ======= cart Product
    Route::post('product/cart/add',[CartController::class,'cartAdd'])->name('product.cart.add');
    Route::get('/allcart',[CartController::class,'cartAll'])->name('allcart');
    Route::get('/cart/remove/{id}',[CartController::class,'remove'])->name('cart.remove');
    Route::get('/cart/updateqty/{rowId}/{qty}',[CartController::class,'updateqty'])->name('cart.updateqty');
    Route::get('/cart/updatesize/{rowId}/{size}',[CartController::class,'updatesize'])->name('cart.updatesize');
    Route::get('/cart/updatecolor/{rowId}/{color}',[CartController::class,'updateColor'])->name('cart.updatecolor');
    Route::get('/cart/destroy',[CartController::class,'destroyCart'])->name('cart.destroy');
    
    // pruduct checkOut 
    Route::get('/checkout',[CheckoutController::class,'checkoutAll'])->name('checkout');

    // coupon Code Apply
    Route::get('/coupon/apply',[CheckoutController::class,'couponApply'])->name('coupon.apply');
    Route::get('/coupon/remove',[CheckoutController::class,'couponRemove'])->name('coupon.remove');

    // order Place
    Route::post('order/place',[CheckoutController::class,'OrderPlace'])->name('order.place');

    Route::get('/cart/color',function(){
        
        // $color = $thumbnail->options->color;
        return response()->json(Cart::content());
    }); 
});

// Route::prefix('customer')->name('customer.')->group(function () {
//     Route::get('/login', [App\Http\Controllers\CustomerAuth\LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [App\Http\Controllers\CustomerAuth\LoginController::class, 'login']);
//     Route::post('/logout', [App\Http\Controllers\CustomerAuth\LoginController::class, 'logout'])->name('logout');

//     Route::get('/register', [App\Http\Controllers\CustomerAuth\RegisterController::class, 'showRegistrationForm'])->name('register');
//     Route::post('/register', [App\Http\Controllers\CustomerAuth\RegisterController::class, 'register']);

//     Route::get('/dashboard', function () {
//         return view('customer.dashboard');
//     })->name('dashboard')->middleware('auth:customer');
// });


// ---------------------============= front end controller =========

Route::get('/dashboard', function () {
    return view('admin.dashboard.index');
})->name('dashboard')->middleware(['auth','is_admin']);

Route::middleware(['auth','is_admin'])->group(function(){
    // Category Controller 
    Route::get('/dashboard/category',[CategoryController::class, 'index'])->name('dashboard.category');
    Route::post('/dashboard/category/insert',[CategoryController::class, 'store'])->name('dashboard.category.store');
    Route::get('/dashboard/category/view/{slug}',[CategoryController::class, 'view'])->name('dashboard.category.view');
    Route::get('/dashboard/category/edit/{slug}',[CategoryController::class, 'edit'])->name('dashboard.category.edit');
    Route::post('/dashboard/category/update',[CategoryController::class, 'update'])->name('dashboard.category.update');
    Route::delete('/dashboard/category/delete/{id}',[CategoryController::class, 'deleteI'])->name('dashboard.category.delete');
    Route::delete('/dashboard/category/softdel',[CategoryController::class, 'softdel'])->name('dashboard.category.softdel');
    // Route::get('/dashboard/category','CategoryController@index')->name('dashboard.category');

    Route::get('/get-childid/{id}',[CategoryController::class,'getChildCatgory']);

    // Sub Category Part =============
    Route::get('/dashboard/subcategory',[SubCategoryController::class, 'index'])->name('dashboard.subcategory');
    Route::post('/dashboard/subcategory/insert',[SubCategoryController::class, 'store'])->name('dashboard.subcategory.store');
    Route::get('/dashboard/subcategory/view/{slug}',[SubCategoryController::class, 'view'])->name('dashboard.subcategory.view');
    Route::get('/dashboard/subcategory/edit/{slug}',[SubCategoryController::class, 'edit'])->name('dashboard.subcategory.edit');
    Route::post('/dashboard/subcategory/update',[SubCategoryController::class, 'update'])->name('dashboard.subcategory.update');
    Route::delete('/dashboard/subcategory/delete/{id}',[SubCategoryController::class, 'deleteI'])->name('dashboard.subcategory.delete');
    Route::delete('/dashboard/subcategory/softdel',[SubCategoryController::class, 'softdel'])->name('dashboard.subcategory.softdel');

    // Child Category Part =============
    Route::get('/dashboard/childcategory',[ChildCategoryController::class, 'index'])->name('dashboard.childcategory');
    Route::post('/dashboard/childcategory/insert',[ChildCategoryController::class, 'store'])->name('dashboard.childcategory.store');
    Route::get('/dashboard/childcategory/view/{slug}',[ChildCategoryController::class, 'view'])->name('dashboard.childcategory.view');
    Route::get('/dashboard/childcategory/edit/{slug}',[ChildCategoryController::class, 'edit'])->name('dashboard.childcategory.edit');
    Route::post('/dashboard/childcategory/update',[ChildCategoryController::class, 'update'])->name('dashboard.childcategory.update');
    Route::delete('/dashboard/childcategory/delete/{id}',[ChildCategoryController::class, 'deleteI'])->name('dashboard.childcategory.delete');
    Route::delete('/dashboard/childcategory/softdel',[ChildCategoryController::class, 'softdel'])->name('dashboard.childcategory.softdel');

    // Brand
    Route::get('/dashboard/brand',[BrandController::class, 'index'])->name('dashboard.brand');
    Route::post('/dashboard/brand/insert',[BrandController::class, 'store'])->name('dashboard.brand.store');
    Route::get('/dashboard/brand/view/{slug}',[BrandController::class, 'view'])->name('dashboard.brand.view');
    Route::get('/dashboard/brand/edit/{slug}',[BrandController::class, 'edit'])->name('dashboard.brand.edit');
    Route::post('/dashboard/brand/update',[BrandController::class, 'update'])->name('dashboard.brand.update');
    // Route::post('/dashboard/brand/softdel',[BrandController::class, 'softdelete'])->name('dashboard.brand.softdel');
    Route::post('/dashboard/brand/delete',[BrandController::class, 'deleteI'])->name('dashboard.brand.delete');

//    Seo Setting Part
    Route::group(['prefix'=>'dashboard'],function(){
        Route::get('/setting/seo',[SettingController::class,'seo'])->name('dashboard.setting.seo');
        Route::post('/setting/seo/update',[SettingController::class,'seoUpdate'])->name('dashboard.setting.seo.update');

        // SMTP Mailer 
        Route::get('/setting/smtp',[SettingController::class,'smtp'])->name('dashboard.setting.smtp');
        Route::post('/setting/smtp/update',[SettingController::class,'smtpUpdate'])->name('dashboard.setting.smtp.update');

        Route::get('/setting/payment_gateway',[SettingController::class,'payment_gateway'])->name('dashboard.setting.payment_gateway');
        Route::post('/setting/payment_gateway/update',[SettingController::class,'payment_gatewayUpdate'])->name('dashboard.setting.payment_gateway.update');
    });

    // WareHouse ============
    Route::get('/dashboard/warehouse',[WarehouseController::class, 'index'])->name('dashboard.warehouse');
    Route::post('/dashboard/warehouse/insert',[WarehouseController::class, 'store'])->name('dashboard.warehouse.store');
    Route::get('/dashboard/warehouse/view/{slug}',[WarehouseController::class, 'view'])->name('dashboard.warehouse.view');
    Route::get('/dashboard/warehouse/edit/{slug}',[WarehouseController::class, 'edit'])->name('dashboard.warehouse.edit');
    Route::post('/dashboard/warehouse/update',[WarehouseController::class, 'update'])->name('dashboard.warehouse.update');
    Route::post('/dashboard/warehouse/softdel',[WarehouseController::class, 'softdelete'])->name('dashboard.warehouse.softdel');
    Route::post('/dashboard/warehouse/delete',[WarehouseController::class, 'deleteI'])->name('dashboard.warehouse.delete');

    // Coupon Part start===
    Route::get('/dashboard/coupon',[CouponController::class, 'index'])->name('dashboard.coupon');
    Route::post('/dashboard/coupon/insert',[CouponController::class, 'store'])->name('dashboard.coupon.store');
    Route::get('/dashboard/coupon/view/{slug}',[CouponController::class, 'view'])->name('dashboard.coupon.view');
    Route::get('/dashboard/coupon/edit/{slug}',[CouponController::class, 'edit'])->name('dashboard.coupon.edit');
    Route::post('/dashboard/coupon/update',[CouponController::class, 'update'])->name('dashboard.coupon.update');
    Route::post('/dashboard/coupon/softdel',[CouponController::class, 'softdelete'])->name('dashboard.coupon.softdel');
    Route::post('/dashboard/coupon/delete',[CouponController::class, 'deleteI'])->name('dashboard.coupon.delete');

     // Product  Part start===
     Route::get('/dashboard/product',[ProductController::class, 'index'])->name('dashboard.product');
     Route::get('/dashboard/product/add',[ProductController::class, 'add'])->name('dashboard.product.add');
     Route::post('/dashboard/product/store',[ProductController::class, 'store'])->name('dashboard.product.store');
     Route::get('/dashboard/product/view/{slug}',[ProductController::class, 'view'])->name('dashboard.product.view');
     Route::get('/dashboard/product/edit/{slug}',[ProductController::class, 'edit'])->name('dashboard.product.edit');
     Route::post('/dashboard/product/update',[ProductController::class, 'update'])->name('dashboard.product.update');
     Route::post('/dashboard/product/softdel',[ProductController::class, 'softdelete'])->name('dashboard.product.softdel');
     Route::post('/dashboard/product/delete',[ProductController::class, 'deleteI'])->name('dashboard.product.delete');
    //  active featured
    Route::get('/dashboard/product/act_feature/{id}',[ProductController::class, 'active_feature'])->name('dashboard.product.act_feature');
    //  deactive featured
    Route::get('/dashboard/product/deact_feature/{id}',[ProductController::class, 'deactive_feature'])->name('dashboard.product.deact_feature');

    //  active featured
    Route::get('/dashboard/product/act_today_deal/{id}',[ProductController::class, 'active_today_deal'])->name('dashboard.product.act_today_deal');
    //  deactive featured
    Route::get('/dashboard/product/deact_today_deal/{id}',[ProductController::class, 'deactive_today_deal'])->name('dashboard.product.deact_today_deal');

    //  active featured
    Route::get('/dashboard/product/act_status/{id}',[ProductController::class, 'active_status'])->name('dashboard.product.act_status');
    //  deactive featured
    Route::get('/dashboard/product/deact_status/{id}',[ProductController::class, 'deactive_status'])->name('dashboard.product.deact_status');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
require __DIR__.'/auth.php';
