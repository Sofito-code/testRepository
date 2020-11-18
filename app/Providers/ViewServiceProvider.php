<?php

namespace App\Providers;

use App\Category;
use App\Http\View\Composers\CategoryComposer;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        View::composer('*', 'App\Http\View\Composers\CategoryComposer');
    }
}
