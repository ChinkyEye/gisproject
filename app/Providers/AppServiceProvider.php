<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Menu;
use App\Sidemenu;
use App\Usefullink;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Request $request)
    {
        Schema::defaultStringLength(191);

        view()->composer('web.layouts.navbar', function ($view) use ($request){
            $view->with('total_menu', Menu::totalMenu($request));
        });
        view()->composer('web.layouts.left-menu', function ($view) use ($request){
            $view->with('left_menu', Sidemenu::totalSidemenu($request));
        });
        view()->composer('web.layouts.footer', function ($view) use ($request){
            $view->with('usefullink', Usefullink::totalusefullink($request));
        });
    }
}
