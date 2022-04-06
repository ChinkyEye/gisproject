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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::namespace('Web')->prefix('')->name('web.')->middleware(['guest'])->group(function(){
    // home
    Route::get('/', 'HomeController@index')->name('home');
    
});

Auth::routes(['reset' => false,
            'register' => false
            ]);

Route::namespace('SuperAdmin')->prefix('home')->name('superadmin.')->middleware(['superadmin','auth'])->group(function(){

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('main-entry/header','HeaderController');
    Route::get('main-entry/header/active/{id}', 'HeaderController@isActive')->name('header.active');

    Route::resource('main-entry/menu','MenuController');
    Route::get('main-entry/menu/active/{id}', 'MenuController@isActive')->name('menu.active');

    Route::resource('main-entry/menuhasdropdown','MenuHasDropdownController');
    Route::get('main-entry/menuhasdropdown/active/{id}', 'MenuHasDropdownController@isActive')->name('menuhasdropdown.active');
    Route::get('main-entry/menu/menuhasdropdown/{id}','MenuHasDropdownController@index')->name('menuhasdropdown.index');
    Route::get('main-entry/menu/menuhasdropdown/create/{id}','MenuHasDropdownController@create')->name('menuhasdropdown.create');

    Route::resource('main-entry/slider', 'SliderController');
        Route::get('main-entry/slider/active/{id}', 'SliderController@isActive')->name('slider.active');

    Route::resource('main-entry/sidemenu', 'SideMenuController');
        Route::get('main-entry/sidemenu/active/{id}', 'SideMenuController@isActive')->name('sidemenu.active');

    //ofices or agency
    Route::resource('/agency','AgencyController');
    Route::get('/agency/active/{id}', 'AgencyController@isActive')->name('agency.active');

    //for user
    Route::resource('/user', 'UserController');
        Route::get('/user/active/{id}', 'UserController@isActive')->name('user.active');
    Route::get('/user/changepassword/{id}', 'UserController@PasswordForm')->name('user.changepassword');
    Route::post('/user/changepassword/store/{id}', 'UserController@changePassword')->name('changepassword');

    Route::resource('mission-vision/mission', 'MissionController');
        Route::get('mission-vision/mission/active/{id}', 'MissionController@isActive')->name('mission.active');

    Route::resource('mission-vision/vision', 'VisionController');
        Route::get('mission-vision/vision/active/{id}', 'VisionController@isActive')->name('vision.active');

    Route::resource('/coreperson','CorePersonController'); 
    Route::get('/coreperson/active/{id}', 'CorePersonController@isActive')->name('coreperson.active');

    Route::resource('/employee','EmployeeController');
    Route::get('/employee/active/{id}', 'EmployeeController@isActive')->name('employee.active');

    Route::resource('/niti','NitiController');
    Route::get('/niti/active/{id}', 'NitiController@isActive')->name('niti.active');
    Route::get('/niti/download/{file}','NitiController@downloadfile')->name('niti.downloadfile');

    Route::resource('/notice','NoticeController');
     Route::get('/notice/active/{id}', 'NoticeController@isActive')->name('notice.active');
    Route::get('/notice/download/{file}','NoticeController@downloadfile')->name('notice.downloadfile');

    Route::resource('/pradeshsabhasadasya','PradeshSabhaSadasya\PradeshSabhaSadasyaController');
    Route::get('/pradeshsabhasadasya/active/{id}', 'PradeshSabhaSadasya\PradeshSabhaSadasyaController@isActive')->name('pradeshsabhasadasya.active');

    Route::resource('/eservice','Eservice\EserviceController');
    Route::get('/eservice/active/{id}', 'Eservice\EserviceController@isActive')->name('eservice.active');

    Route::resource('/hellocm','HelloCM\HelloCMController');
    Route::get('/hellocm/active/{id}', 'HelloCM\HelloCMController@isActive')->name('hellocm.active');

    Route::resource('/mantralaya','Mantralaya\MantralayaController');
    Route::get('/mantralaya/active/{id}', 'Mantralaya\MantralayaController@isActive')->name('mantralaya.active');

    Route::resource('/importantplace','ImportantPlace\ImportantPlaceController');
    Route::get('/importantplace/active/{id}', 'ImportantPlace\ImportantPlaceController@isActive')->name('importantplace.active');








});


Route::namespace('User')->prefix('user')->name('user.')->middleware(['user','auth'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('userhasdetail','UserHasDetailController');
    Route::get('/userhasdetail/create/{id}','UserHasDetailController@create')->name('userhasdetail.create');

});