<?php

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


Route::get('/', 'Fe\HomeController@index')->name('home');
Route::get('/content/{id}', 'Fe\ContentController@view')->name('view');

Route::get('/news', 'Fe\NewController@index')->name('index');
Route::get('/news/{id}', 'Fe\NewController@view')->name('view');

Route::get('/team/{id}', 'Fe\TeamController@index')->name('index');
Route::get('/download', 'Fe\DownloadController@index')->name('index');

Route::get('/faq', 'Fe\FaqController@index')->name('index');
Route::get('/presidentcorner', 'Fe\PresidentCornerController@index')->name('index');

Route::get('register', 'Fe\UserController@registerForm');
Route::get('login', 'Fe\UserController@loginForm');








/* ajax */
Route::group(['middleware' => ['cors']], function () {        
    Route::post('login', 'Auth\LoginController@login');
    Route::post('register', 'Auth\RegisterController@create'); 
    Route::post('forgot', 'Auth\ForgotPasswordController@index');  // for reset send mail when from login screen
    Route::get('forgot/{id}', 'Auth\ForgotPasswordController@form'); // for reset form when request from mail
    Route::post('forgot/update', 'Auth\ForgotPasswordController@update');        
});







/* fe user autherized sections*/
Route::group(['middleware' => ['web','cors']], function() {
    Route::get('/dashboard', 'Fe\UserController@dashboard')->name('dashboard');
    Route::post('/dashboard', 'Fe\UserController@profile')->name('profile');
    Route::get('/checkout', 'Fe\OrderController@checkout')->name('checkout');
    Route::post('/order', 'Fe\OrderController@placeOrder')->name('placeOrder');
    Route::get('/order_success', 'Fe\OrderController@orderSuccess')->name('order_success');
    Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

    Route::get('/myorders', 'Fe\OrderController@myOrders')->name('myOrders');
    Route::get('/myorders/{id}', 'Fe\OrderController@myOrderDetails')->name('myOrderDetails');

});










Route::prefix('admin')->group(function () {
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');
    Route::get('/logout','Auth\AdminLoginController@logout')->name('admin.logout');
    //admin password reset routes
    Route::post('/password/email','Auth\AdminForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
    Route::get('/password/reset','Auth\AdminForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
    Route::post('/password/reset','Auth\AdminResetPasswordController@reset');
    Route::get('/password/reset/{token}','Auth\AdminResetPasswordController@showResetForm')->name('admin.password.reset');
    
    Route::get('/', 'Admin\AdminController@dashboard')->name('admin.dashboard');
    Route::get('/admin/welcome', 'Admin\AdminController@welcome')->name('admin.welcome');  
  

    Route::get('/adminuser/profile', 'Admin\AdminController@profile')->name('adminuser.profile');
    Route::get('/adminuser/password', 'Admin\AdminController@password')->name('adminuser.password');
    Route::put('/adminuser/profile', 'Admin\AdminController@profileUpdate')->name('adminuser.profileUpdate');
    Route::put('/adminuser/password', 'Admin\AdminController@passwordUpdate')->name('adminuser.passwordUpdate');
   
    



    //sections start   


    Route::get('/adminuser', 'Admin\AdminController@index')->name('adminuser.index');
    Route::get('/adminuser/create', 'Admin\AdminController@create')->name('adminuser.create');
    Route::post('/adminuser', 'Admin\AdminController@store')->name('adminuser.store');
    Route::get('/adminuser/{id}/edit', 'Admin\AdminController@edit')->name('adminuser.edit');
    Route::put('/adminuser/{id}', 'Admin\AdminController@update')->name('adminuser.update');
    Route::delete('/adminuser/{id}', 'Admin\AdminController@destroy')->name('adminuser.destroy');
    Route::get('/adminuser/{id}/status', 'Admin\AdminController@status')->name('adminuser.status');
    Route::get('/adminuser/{id}/show', 'Admin\AdminController@show')->name('adminuser.show');



    Route::get('/banner', 'Admin\BannerController@index')->name('banner.index');
    Route::get('/banner/create', 'Admin\BannerController@create')->name('banner.create');
    Route::post('/banner', 'Admin\BannerController@store')->name('banner.store');
    Route::get('/banner/{id}/edit', 'Admin\BannerController@edit')->name('banner.edit');
    Route::put('/banner/{id}', 'Admin\BannerController@update')->name('banner.update');
    Route::delete('/banner/{id}', 'Admin\BannerController@destroy')->name('banner.destroy');
    Route::get('/banner/{id}/status', 'Admin\BannerController@status')->name('banner.status');
    Route::get('/banner/{id}/show', 'Admin\BannerController@show')->name('banner.show');
    Route::post('/banner/priority', 'Admin\BannerController@priority')->name('banner.priority');

    Route::get('/category', 'Admin\CategoryController@index')->name('category.index');
    Route::get('/category/create', 'Admin\CategoryController@create')->name('category.create');
    Route::post('/category', 'Admin\CategoryController@store')->name('category.store');
    Route::get('/category/{id}/edit', 'Admin\CategoryController@edit')->name('category.edit');
    Route::put('/category/{id}', 'Admin\CategoryController@update')->name('category.update');
    Route::delete('/category/{id}', 'Admin\CategoryController@destroy')->name('category.destroy');
    Route::get('/category/{id}/status', 'Admin\CategoryController@status')->name('category.status');
    Route::get('/category/{id}/show', 'Admin\CategoryController@show')->name('category.show');





    Route::get('/gallery', 'Admin\GalleryController@index')->name('gallery.index');
    Route::get('/gallery/create', 'Admin\GalleryController@create')->name('gallery.create');
    Route::post('/gallery', 'Admin\GalleryController@store')->name('gallery.store');
    Route::get('/gallery/{id}/edit', 'Admin\GalleryController@edit')->name('gallery.edit');
    Route::put('/gallery/{id}', 'Admin\GalleryController@update')->name('gallery.update');
    Route::delete('/gallery/{id}', 'Admin\GalleryController@destroy')->name('gallery.destroy');
    Route::get('/gallery/{id}/status', 'Admin\GalleryController@status')->name('gallery.status');
    Route::get('/gallery/{id}/show', 'Admin\GalleryController@show')->name('gallery.show');



    Route::get('/downloads', 'Admin\DownloadsController@index')->name('downloads.index');
    Route::get('/downloads/create', 'Admin\DownloadsController@create')->name('downloads.create');
    Route::post('/downloads', 'Admin\DownloadsController@store')->name('downloads.store');
    Route::get('/downloads/{id}/edit', 'Admin\DownloadsController@edit')->name('downloads.edit');
    Route::put('/downloads/{id}', 'Admin\DownloadsController@update')->name('downloads.update');
    Route::delete('/downloads/{id}', 'Admin\DownloadsController@destroy')->name('downloads.destroy');
    Route::get('/downloads/{id}/status', 'Admin\DownloadsController@status')->name('downloads.status');
    Route::get('/downloads/{id}/show', 'Admin\DownloadsController@show')->name('downloads.show');


    Route::get('/content', 'Admin\ContentController@index')->name('content.index');
    Route::get('/content/create', 'Admin\ContentController@create')->name('content.create');
    Route::post('/content', 'Admin\ContentController@store')->name('content.store');
    Route::get('/content/{id}/edit', 'Admin\ContentController@edit')->name('content.edit');
    Route::put('/content/{id}', 'Admin\ContentController@update')->name('content.update');
    Route::delete('/content/{id}', 'Admin\ContentController@destroy')->name('content.destroy');
    Route::get('/content/{id}/status', 'Admin\ContentController@status')->name('content.status');
    Route::get('/content/{id}/show', 'Admin\ContentController@show')->name('content.show');



    Route::get('/news', 'Admin\NewsController@index')->name('news.index');
    Route::get('/news/create', 'Admin\NewsController@create')->name('news.create');
    Route::post('/news', 'Admin\NewsController@store')->name('news.store');
    Route::get('/news/{id}/edit', 'Admin\NewsController@edit')->name('news.edit');
    Route::put('/news/{id}', 'Admin\NewsController@update')->name('news.update');
    Route::delete('/news/{id}', 'Admin\NewsController@destroy')->name('news.destroy');
    Route::get('/news/{id}/status', 'Admin\NewsController@status')->name('news.status');
    Route::get('/news/{id}/show', 'Admin\NewsController@show')->name('news.show');





    Route::get('/faq', 'Admin\FaqController@index')->name('faq.index');
    Route::get('/faq/create', 'Admin\FaqController@create')->name('faq.create');
    Route::post('/faq', 'Admin\FaqController@store')->name('faq.store');
    Route::get('/faq/{id}/edit', 'Admin\FaqController@edit')->name('faq.edit');
    Route::put('/faq/{id}', 'Admin\FaqController@update')->name('faq.update');
    Route::delete('/faq/{id}', 'Admin\FaqController@destroy')->name('faq.destroy');
    Route::get('/faq/{id}/status', 'Admin\FaqController@status')->name('faq.status');
    Route::get('/faq/{id}/show', 'Admin\FaqController@show')->name('faq.show');
    


    Route::get('/event', 'Admin\EventController@index')->name('event.index');
    Route::get('/event/create', 'Admin\EventController@create')->name('event.create');
    Route::post('/event', 'Admin\EventController@store')->name('event.store');
    Route::get('/event/{id}/edit', 'Admin\EventController@edit')->name('event.edit');
    Route::put('/event/{id}', 'Admin\EventController@update')->name('event.update');
    Route::delete('/event/{id}', 'Admin\EventController@destroy')->name('event.destroy');
    Route::get('/event/{id}/status', 'Admin\EventController@status')->name('event.status');
    Route::get('/event/{id}/show', 'Admin\EventController@show')->name('event.show');


    // Route::get('/zoneevent', 'Admin\ZoneEventController@index')->name('zoneevent.index');
    // Route::get('/zoneevent/create', 'Admin\ZoneEventController@create')->name('zoneevent.create');
    // Route::post('/zoneevent', 'Admin\ZoneEventController@store')->name('zoneevent.store');
    // Route::get('/zoneevent/{id}/edit', 'Admin\ZoneEventController@edit')->name('zoneevent.edit');
    // Route::put('/zoneevent/{id}', 'Admin\ZoneEventController@update')->name('zoneevent.update');
    // Route::delete('/zoneevent/{id}', 'Admin\ZoneEventController@destroy')->name('zoneevent.destroy');
    // Route::get('/zoneevent/{id}/status', 'Admin\ZoneEventController@status')->name('zoneevent.status');
    // Route::get('/zoneevent/{id}/show', 'Admin\ZoneEventController@show')->name('zoneevent.show');



    Route::get('/programe', 'Admin\ProgrameController@index')->name('programe.index');
    Route::get('/programe/create', 'Admin\ProgrameController@create')->name('programe.create');
    Route::post('/programe', 'Admin\ProgrameController@store')->name('programe.store');
    Route::get('/programe/{id}/edit', 'Admin\ProgrameController@edit')->name('programe.edit');
    Route::put('/programe/{id}', 'Admin\ProgrameController@update')->name('programe.update');
    Route::delete('/programe/{id}', 'Admin\ProgrameController@destroy')->name('programe.destroy');
    Route::get('/programe/{id}/status', 'Admin\ProgrameController@status')->name('programe.status');
    Route::get('/programe/{id}/show', 'Admin\ProgrameController@show')->name('programe.show');


    Route::get('/team', 'Admin\TeamController@index')->name('team.index');
    Route::get('/team/create', 'Admin\TeamController@create')->name('team.create');
    Route::post('/team', 'Admin\TeamController@store')->name('team.store');
    Route::get('/team/{id}/edit', 'Admin\TeamController@edit')->name('team.edit');
    Route::put('/team/{id}', 'Admin\TeamController@update')->name('team.update');
    Route::delete('/team/{id}', 'Admin\TeamController@destroy')->name('team.destroy');
    Route::get('/team/{id}/status', 'Admin\TeamController@status')->name('team.status');
    Route::get('/team/{id}/show', 'Admin\TeamController@show')->name('team.show');


    Route::get('/zone', 'Admin\ZoneController@index')->name('zone.index');
    Route::get('/zone/create', 'Admin\ZoneController@create')->name('zone.create');
    Route::post('/zone', 'Admin\ZoneController@store')->name('zone.store');
    Route::get('/zone/{id}/edit', 'Admin\ZoneController@edit')->name('zone.edit');
    Route::put('/zone/{id}', 'Admin\ZoneController@update')->name('zone.update');
    Route::delete('/zone/{id}', 'Admin\ZoneController@destroy')->name('zone.destroy');
    Route::get('/zone/{id}/status', 'Admin\ZoneController@status')->name('zone.status');
    Route::get('/zone/{id}/show', 'Admin\ZoneController@show')->name('zone.show');


    Route::get('/designation', 'Admin\DesignationController@index')->name('designation.index');
    Route::get('/designation/create', 'Admin\DesignationController@create')->name('designation.create');
    Route::post('/designation', 'Admin\DesignationController@store')->name('designation.store');
    Route::get('/designation/{id}/edit', 'Admin\DesignationController@edit')->name('designation.edit');
    Route::put('/designation/{id}', 'Admin\DesignationController@update')->name('designation.update');
    Route::delete('/designation/{id}', 'Admin\DesignationController@destroy')->name('designation.destroy');
    Route::get('/designation/{id}/status', 'Admin\DesignationController@status')->name('designation.status');
    Route::get('/designation/{id}/show', 'Admin\DesignationController@show')->name('designation.show');
    
    
    
    
    Route::get('/presidentcorner', 'Admin\PresidentCornerController@edit')->name('presidentcorner.edit');
    Route::put('/presidentcorner/{id}', 'Admin\PresidentCornerController@update')->name('presidentcorner.update');
    

   


});

//Auth::routes();



