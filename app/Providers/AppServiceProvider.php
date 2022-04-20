<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\Menu;
use App\Sidemenu;
use App\Usefullink;
use App\Notice;
use App\AboutUs;
use App\ContactUs;
use App\Header;



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
        view()->composer('web.layouts.head-top', function ($view) use ($request){
            $view->with('notice', Notice::totalnotice($request));
        }); 
        view()->composer('web.layouts.footer', function ($view) use ($request){
            $view->with('aboutus', AboutUs::totalaboutus($request));
        });  
        view()->composer('web.layouts.footer', function ($view) use ($request){
            $view->with('contact', ContactUs::totalcontact($request));
        });  
        view()->composer('web.layouts.header', function ($view) use ($request){
            $view->with('header', Header::totalheader($request));
        }); 
       
    }
}
