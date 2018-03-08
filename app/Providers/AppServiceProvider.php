<?php

namespace App\Providers;

use App\Category;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $dev_categories = Category::all()->where('group',1);
        $lang_categories = Category::all()->where('group',2);
        $business_categories = Category::all()->where('group',3);
        view()->share('dev_categories', $dev_categories);
        view()->share('lang_categories', $lang_categories);
        view()->share('business_categories', $business_categories);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
