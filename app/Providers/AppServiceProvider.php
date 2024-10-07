<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;
use App\Models\SubCatgory;
use App\Models\ChildCatgory;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $category = Category::with(['subcategory','childcategory'])->where('cat_status','1')->latest('id')->get();
        // View::composer('layouts.section_divide.main_nav', function ($view) use ( $categorie ) {
        //     $view->with('categories', $categories);
        //     // $view->with('basics', $basics);
        //     // $view->with('socials', $socials);
        // });
        view()->share('category',$category);

    }
}
