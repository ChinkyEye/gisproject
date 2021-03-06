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
            // 'register' => false
            ]);

Route::namespace('SuperAdmin')->prefix('home')->name('superadmin.')->middleware(['superadmin','auth'])->group(function(){

    Route::get('/order-menu','MenuController@order_menu')->name('order-menu');


    Route::get('/', 'HomeController@index')->name('home');

    // password
    Route::get('/changepassword','HomeController@showChangePasswordForm')->name('password.index');
    Route::post('change/password/','HomeController@changePassword')->name('change.password');

    Route::resource('surveyform','Survey\SurveyFormController');
    Route::get('surveyform/attribute/{id}', 'Survey\SurveyFormAttributeController@createSurveyFormAttribute')->name('surveyform.attribute');
    Route::resource('surveyformattribute', 'Survey\SurveyFormAttributeController');
    Route::get('surveyform/get/type', 'Survey\SurveyFormAttributeController@getType')->name('survey.getType');

    Route::resource('main-entry/header','HeaderController');
    Route::get('main-entry/header/active/{id}', 'HeaderController@isActive')->name('header.active');

    Route::resource('main-entry/menu','MenuController');
    Route::get('main-entry/menu/active/{id}', 'MenuController@isActive')->name('menu.active');
    Route::post('main-entry/menu/getTypeList', 'MenuController@getTypeList')->name('getTypeList');


    Route::resource('main-entry/menuhasdropdown','MenuHasDropdownController');
    Route::get('main-entry/menuhasdropdown/active/{id}', 'MenuHasDropdownController@isActive')->name('menuhasdropdown.active');
    Route::get('main-entry/menu/menuhasdropdown/{id}','MenuHasDropdownController@index')->name('menuhasdropdown.index');
    Route::get('main-entry/menu/menuhasdropdown/create/{id}','MenuHasDropdownController@create')->name('menuhasdropdown.create');
    Route::post('/update-items', 'MenuHasDropdownController@updateItems')->name('update.items');

    Route::resource('main-entry/slider', 'SliderController');
        Route::get('main-entry/slider/active/{id}', 'SliderController@isActive')->name('slider.active');

    Route::resource('main-entry/sidemenu', 'SideMenuController');
        Route::get('main-entry/sidemenu/active/{id}', 'SideMenuController@isActive')->name('sidemenu.active');
    Route::get('/sortable-sidemenu','SideMenuController@sortable_sidemenu')->name('sortable-sidemenu');


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

    Route::resource('/employee','EmployeeController');
    Route::get('/employee/active/{id}', 'EmployeeController@isActive')->name('employee.active');

    // for static model has type
    Route::get('menu-page/{type}/modelhastype', 'ModelHasTypeController@index')->name('modelhastype.index');
    Route::get('/menu-page/modelhastype/active/{id}', 'ModelHasTypeController@isActive')->name('modelhastype.active');
    Route::get('menu-page/{type}/modelhastype/create', 'ModelHasTypeController@create')->name('modelhastype.create');
    Route::post('menu-page/modelhastype/store', 'ModelHasTypeController@store')->name('modelhastype.store');
    Route::get('menu-page/modelhastype/{id}/edit', 'ModelHasTypeController@edit')->name('modelhastype.edit');
    Route::post('menu-page/modelhastype/update/{id}', 'ModelHasTypeController@update')->name('modelhastype.update');
    Route::delete('menu-page/modelhastype/destroy/{id}', 'ModelHasTypeController@destroy')->name('modelhastype.delete');

    //end

    Route::resource('menu-page/coreperson','CorePersonController'); 
    Route::get('menu-page/coreperson/active/{id}', 'CorePersonController@isActive')->name('coreperson.active');

    Route::resource('menu-page/department','DepartmentController');
    Route::get('menu-page/department/active/{id}', 'DepartmentController@isActive')->name('department.active'); 


    // Route::resource('niti','NitiController');
    Route::resource('menu-page/niti','NitiController');
    Route::get('menu-page/niti/active/{id}', 'NitiController@isActive')->name('niti.active');
    Route::get('menu-page/niti/download/{file}','NitiController@downloadfile')->name('niti.downloadfile');

    Route::resource('menu-page/notice','NoticeController');
     Route::get('menu-page/notice/active/{id}', 'NoticeController@isActive')->name('notice.active');
    Route::get('menu-page/notice/download/{file}','NoticeController@downloadfile')->name('notice.downloadfile');

    Route::resource('menu-page/pratibedan','PratibedanController');
    Route::get('menu-page/pratibedan/active/{id}', 'PratibedanController@isActive')->name('pratibedan.active');
    Route::get('menu-page/pratibedan/download/{file}','PratibedanController@downloadfile')->name('pratibedan.downloadfile');


    Route::resource('menu-page/sangathansanrachana','SangathanSanrachana\SangathanSanrachanaController');
    Route::get('menu-page/sangathansanrachana/active/{id}', 'SangathanSanrachana\SangathanSanrachanaController@isActive')->name('sangathansanrachana.active');

    Route::resource('menu-page/contactus','ContactUsController');
    Route::get('menu-page/contactus/active/{id}', 'ContactUsController@isActive')->name('contactus.active');

    Route::resource('menu-page/aboutus','AboutUsController');
    Route::get('menu-page/aboutus/active/{id}', 'AboutUsController@isActive')->name('aboutus.active');

    Route::resource('menu-page/gallery','GalleryController');
    Route::get('menu-page/gallery/active/{id}', 'GalleryController@isActive')->name('gallery.active');

    Route::resource('menu-page/galleryhasimage','GalleryHasImageController');
    Route::get('menu-page/gallery/galleryhasimage/{id}','GalleryHasImageController@index')->name('galleryhasimage.index');




    Route::resource('sidebar-part/dal','Dal\DalController');
    Route::get('sidebar-part/dal/active/{id}', 'Dal\DalController@isActive')->name('dal.active');

    Route::resource('sidebar-part/pradeshsabhasadasya','PradeshSabhaSadasya\PradeshSabhaSadasyaController');
    Route::get('sidebar-part/pradeshsabhasadasya/active/{id}', 'PradeshSabhaSadasya\PradeshSabhaSadasyaController@isActive')->name('pradeshsabhasadasya.active');

    Route::resource('sidebar-part/eservice','Eservice\EserviceController');
    Route::get('sidebar-part/eservice/active/{id}', 'Eservice\EserviceController@isActive')->name('eservice.active');

    Route::resource('sidebar-part/hellocm','HelloCM\HelloCMController');
    Route::get('sidebar-part/hellocm/active/{id}', 'HelloCM\HelloCMController@isActive')->name('hellocm.active');

    Route::resource('sidebar-part/mantralaya','Mantralaya\MantralayaController');
    Route::get('sidebar-part/mantralaya/active/{id}', 'Mantralaya\MantralayaController@isActive')->name('mantralaya.active');
    Route::get('/sidebar-part/mantralaya/changepassword/{id}', 'Mantralaya\MantralayaController@PasswordForm')->name('mantralaya.changepassword');
    // Route::post('/sidebar-part/mantralaya/changepassword/store/{id}', 'Mantralaya\MantralayaController@changePassword')->name('mantralaya.storechangepassword');
    Route::get('/order-directories','Mantralaya\MantralayaController@order_directories')->name('order-directories');
    Route::post('/resetpassword', 'Mantralaya\MantralayaController@resetpassword')->name('resetpassword');



    Route::resource('sidebar-part/importantplace','ImportantPlace\ImportantPlaceController');
    Route::get('sidebar-part/importantplace/active/{id}', 'ImportantPlace\ImportantPlaceController@isActive')->name('importantplace.active');

    Route::resource('sidebar-part/apimantri','ApiMantri\ApiMantriController');
    Route::get('/apimantri-sort','ApiMantri\ApiMantriController@apimantri_sort')->name('apimantri-sort');


    Route::resource('fiscalyear','FiscalYearController');
    Route::get('fiscalyear/active/{id}', 'FiscalYearController@isActive')->name('fiscalyear.active');

    // Route::resource('office', 'Office\OfficeController');
    // Route::get('office/active/{id}', 'Office\OfficeController@isActive')->name('office.active');


    Route::resource('/usefullink','Usefullink\UsefullinkController');
    Route::get('usefullink/active/{id}', 'Usefullink\UsefullinkController@isActive')->name('usefullink.active');

    Route::resource('/introduction','Introduction\IntroductionController');
     Route::get('introduction/active/{id}', 'Introduction\IntroductionController@isActive')->name('introduction.active');

     Route::resource('sidebar-part/pradeshsarkar','PradeshSarkar\PradeshSarkarController');
     Route::get('sidebar-part/pradeshsarkar/active/{id}', 'PradeshSarkar\PradeshSarkarController@isActive')->name('pradeshsarkar.active');

    Route::resource('/istaniyataha','IsthaniyaTaha\IsthaniyaTahaController');
     Route::get('/istaniyataha/active/{id}', 'IsthaniyaTaha\IsthaniyaTahaController@isActive')->name('istaniyataha.active');
});


Route::namespace('User')->prefix('user')->name('user.')->middleware(['user'])->group(function(){
    Route::get('/', 'HomeController@index')->name('home');
   

    Route::resource('userhasdetail','UserHasDetailController');
    // Route::resource('surveyform','SurveyFormController');
    // Route::get('surveyform/attribute/{id}', 'SurveyFormAttributeController@createSurveyFormAttribute')->name('surveyform.attribute');
    // Route::resource('surveyformattribute', 'SurveyFormAttributeController');
    Route::resource('surveyform','SurveyFormController');
    Route::get('surveyform/attribute/{id}', 'SurveyFormAttributeController@createSurveyFormAttribute')->name('surveyform.attribute');
    Route::resource('surveyformattribute', 'SurveyFormAttributeController');

    Route::get('surveyform/get/type', 'SurveyFormAttributeController@getType')->name('survey.getType');
    Route::post('/survey/form/edit', 'SurveyFormController@getSurveyEdit')->name('survey_form.edit');
    Route::delete('/surveyform/surveychoice/destroy/{id}','SurveyFormController@deleteSurveyChoice')->name('surveyformchoice.destroy');
   //surveyformattributeedit
    Route::post('surveyform/attribute/update/allvalues', 'SurveyFormAttributeController@getSurveyAttributeUpdate')->name('survey.getSurveyAttributeUpdate');
    
    //surveychoiceform
    Route::post('/survey/form/choice/edit', 'SurveyFormController@getSurveyChoiceEdit')->name('survey_form_choice.edit');
    Route::post('/survey/form/choice/add', 'SurveyFormController@addSurveyChoice')->name('addsurveyformchoice.store');

    Route::get('surveyform/active/{id}', 'SurveyFormController@isActive')->name('surveyform.active');
    Route::get('surveyformquestion/active/{id}', 'SurveyFormController@isActiveQuestion')->name('surveyformquestion.active');
    Route::get('surveyform/getsurveyuser/{slug}', 'SurveyFormController@getsurveyuser')->name('surveyform.getsurveyuser');
    Route::get('surveyform/surveyanswer/{id}', 'SurveyFormController@getSurveyanswer')->name('surveyform.surveyanswer');
    Route::get('/survey-question','SurveyFormController@survey_question')->name('survey-question');



});
Route::namespace('SurveyUser')->name('surveyuser.')->middleware(['surveyuser'])->group(function(){
    Route::get('/surrvey', 'SurveyController@index')->name('home');

});

Route::namespace('Web')->prefix('')->name('web.')->middleware(['guest','setlocale'])->group(function(){
    Route::get('language/{lang}', 'HomeController@switchLang')->name('LangChange');

    // home
    Route::get('/', 'HomeController@index')->name('home');
    Route::get('/survey', 'SurveyController@index')->name('survey.index');
    Route::post('/survey', 'SurveyController@store')->name('survey.index');
    Route::get('/surrvey/{slug}', 'SurveyController@getQuestion')->name('survey.question');
    Route::get('/list', 'HomeController@list')->name('list');
    Route::get('/mantralaya', 'MantralayaController@index')->name('mantralaya.index');
    Route::get('/mantralaya/{id}', 'MantralayaController@show')->name('mantralaya.detail');
    Route::get('/contactus','ContactUsController@index')->name('contactus.index');

    Route::get('/province-gallery', 'HomeController@gallery')->name('gallery');
    Route::get('/province-gallery/{slug}', 'HomeController@gallerySlug')->name('gallerySlug');
    Route::get('/detail/{type}', 'DetailController@index')->name('detail.index');
    Route::get('/detail/{type}/search', 'DetailController@search')->name('detail.search');
    Route::get('/api/{type}/search', 'DetailController@apisearch')->name('api.search');
    Route::get('/{link}/{links?}', 'HomeController@link')->name('home.link');
    Route::get('/{link}/detail/{id}', 'HomeController@detail')->name('home.detail');
    Route::get('/{link}/{link2}/more/{id}', 'HomeController@more')->name('home.more');
    Route::get('/web/sidelink/{link}', 'HomeController@sidelink')->name('home.sidelink');
    Route::get('/web/sidelink/moredetail/{id}', 'HomeController@sidelinkmore')->name('home.sidelinkmore');
    Route::get('/web/sidelink/sthaniyatahamore/{id}', 'HomeController@sthaniyatahamore')->name('home.sthaniyatahamore');
    
    Route::get('importantplace/moredetail/{id}', 'ImportantPlaceController@importantplacedetail')->name('home.importantplacedetail');
    Route::get('notice/scroll/{id}', 'HomeController@noticescroll')->name('noticescroll');


    
});

