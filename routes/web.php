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

    Route::resource('menu-page/mission', 'MissionController');
        Route::get('menu-page/mission/active/{id}', 'MissionController@isActive')->name('mission.active');

    Route::resource('menu-page/vision', 'VisionController');
        Route::get('menu-page/vision/active/{id}', 'VisionController@isActive')->name('vision.active');

    Route::resource('menu-page/coreperson','CorePersonController'); 
    Route::get('menu-page/coreperson/active/{id}', 'CorePersonController@isActive')->name('coreperson.active');

    Route::resource('/employee','EmployeeController');
    Route::get('/employee/active/{id}', 'EmployeeController@isActive')->name('employee.active');

    Route::get('menu-page/{type}/modelhastype', 'ModelHasTypeController@index')->name('modelhastype.index');
    Route::get('menu-page/{type}/modelhastype/create', 'ModelHasTypeController@create')->name('modelhastype.create');
    Route::post('menu-page/modelhastype/store', 'ModelHasTypeController@store')->name('modelhastype.store');
    Route::get('menu-page/modelhastype/{id}/edit', 'ModelHasTypeController@edit')->name('modelhastype.edit');
    Route::post('menu-page/modelhastype/update/{id}', 'ModelHasTypeController@update')->name('modelhastype.update');

    Route::resource('menu-page/niti/nitihastype','NitiHasTypeController');

    // Route::resource('niti','NitiController');
    Route::resource('menu-page/niti','NitiController');
    Route::get('menu-page/niti/active/{id}', 'NitiController@isActive')->name('niti.active');
    Route::get('menu-page/niti/download/{file}','NitiController@downloadfile')->name('niti.downloadfile');



    Route::resource('menu-page/notice','NoticeController');
     Route::get('menu-page/notice/active/{id}', 'NoticeController@isActive')->name('notice.active');
    Route::get('menu-page/notice/download/{file}','NoticeController@downloadfile')->name('notice.downloadfile');

    Route::resource('menu-page/sangathansanrachana','SangathanSanrachana\SangathanSanrachanaController');
    Route::get('menu-page/sangathansanrachana/active/{id}', 'SangathanSanrachana\SangathanSanrachanaController@isActive')->name('sangathansanrachana.active');



    Route::resource('sidebar-part/pradeshsabhasadasya','PradeshSabhaSadasya\PradeshSabhaSadasyaController');
    Route::get('sidebar-part/pradeshsabhasadasya/active/{id}', 'PradeshSabhaSadasya\PradeshSabhaSadasyaController@isActive')->name('pradeshsabhasadasya.active');

    Route::resource('sidebar-part/eservice','Eservice\EserviceController');
    Route::get('sidebar-part/eservice/active/{id}', 'Eservice\EserviceController@isActive')->name('eservice.active');

    Route::resource('sidebar-part/hellocm','HelloCM\HelloCMController');
    Route::get('sidebar-part/hellocm/active/{id}', 'HelloCM\HelloCMController@isActive')->name('hellocm.active');

    Route::resource('sidebar-part/mantralaya','Mantralaya\MantralayaController');
    Route::get('sidebar-part/mantralaya/active/{id}', 'Mantralaya\MantralayaController@isActive')->name('mantralaya.active');

    Route::resource('sidebar-part/importantplace','ImportantPlace\ImportantPlaceController');
    Route::get('sidebar-part/importantplace/active/{id}', 'ImportantPlace\ImportantPlaceController@isActive')->name('importantplace.active');


    Route::resource('fiscalyear','FiscalYearController');
    Route::get('fiscalyear/active/{id}', 'FiscalYearController@isActive')->name('fiscalyear.active');
    Route::resource('office', 'Office\OfficeController');
     Route::get('office/active/{id}', 'Office\OfficeController@isActive')->name('office.active');
});


Route::namespace('User')->prefix('user')->name('user.')->middleware(['user','auth'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('userhasdetail','UserHasDetailController');
    Route::get('/userhasdetail/create/{id}','UserHasDetailController@create')->name('userhasdetail.create');

});

Route::namespace('Web')->prefix('')->name('web.')->middleware(['guest'])->group(function(){
    // home
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/detail/{type}', 'DetailController@index')->name('detail.index');
    Route::get('/{link}/{links?}', 'HomeController@link')->name('home.link');
    Route::get('/web/sidelink/{link}', 'HomeController@sidelink')->name('home.sidelink');
    
});
