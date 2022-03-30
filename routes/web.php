<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['reset' => false,
            'register' => false
            ]);

Route::namespace('SuperAdmin')->prefix('home')->name('superadmin.')->middleware(['superadmin','auth'])->group(function(){

    Route::get('/', 'HomeController@index')->name('home');
    Route::resource('/header','HeaderController');
    Route::get('header/active/{id}', 'HeaderController@isActive')->name('header.active');

    Route::resource('/menu','MenuController');
    Route::get('menu/active/{id}', 'MenuController@isActive')->name('menu.active');

    Route::resource('/menuhasdropdown','MenuHasDropdownController');
    Route::get('/menuhasdropdown/active/{id}', 'MenuHasDropdownController@isActive')->name('menuhasdropdown.active');
    Route::get('/menu/menuhasdropdown/{id}','MenuHasDropdownController@index')->name('menuhasdropdown.index');
    Route::get('/menu/menuhasdropdown/create/{id}','MenuHasDropdownController@create')->name('menuhasdropdown.create');

    //ofices or agency
    Route::resource('/agency','AgencyController');
    Route::get('/agency/active/{id}', 'AgencyController@isActive')->name('agency.active');

    //for user
    Route::resource('/user', 'UserController');
        Route::get('/user/active/{id}', 'UserController@isActive')->name('user.active');

    Route::resource('/slider', 'SliderController');
        Route::get('/slider/active/{id}', 'SliderController@isActive')->name('slider.active');

    Route::resource('/sidemenu', 'SideMenuController');
        Route::get('/sidemenu/active/{id}', 'SideMenuController@isActive')->name('sidemenu.active');

    Route::resource('/mission', 'MissionController');
        Route::get('/mission/active/{id}', 'MissionController@isActive')->name('mission.active');

    Route::resource('/vision', 'VisionController');
        Route::get('/vision/active/{id}', 'VisionController@isActive')->name('vision.active');


});


Route::namespace('User')->prefix('user')->name('user.')->middleware(['user','auth'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('userhasdetail','UserHasDetailController');
    Route::get('/userhasdetail/create/{id}','UserHasDetailController@create')->name('userhasdetail.create');

});