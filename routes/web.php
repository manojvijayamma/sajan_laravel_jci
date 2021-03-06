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

Route::get('/news', 'Fe\NewsController@index')->name('index');
Route::get('/news/{id}', 'Fe\NewsController@view')->name('news.view');

Route::get('/programs', 'Fe\ProgramsController@index')->name('index');
Route::get('/programs/{id}', 'Fe\ProgramsController@view')->name('programs.view');


Route::get('/event/{id}', 'Fe\EventController@index')->name('index');
Route::get('/event/{id}/{eid}', 'Fe\EventController@view')->name('event.details');

Route::get('/team/history/{id}', 'Fe\TeamController@history')->name('index');
Route::get('/team/{id}', 'Fe\TeamController@index')->name('index');
Route::get('/team/{id}/{vid}', 'Fe\TeamController@view')->name('team.view');


Route::get('/downloads', 'Fe\DownloadsController@index')->name('index');
Route::get('/video', 'Fe\VideoController@index')->name('index');
Route::get('/challenge', 'Fe\ChallengeController@index')->name('index');

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
    Route::post('/category/priority', 'Admin\CategoryController@priority')->name('category.priority');




    Route::get('/gallery', 'Admin\GalleryController@index')->name('gallery.index');
    Route::get('/gallery/create', 'Admin\GalleryController@create')->name('gallery.create');
    Route::post('/gallery', 'Admin\GalleryController@store')->name('gallery.store');
    Route::get('/gallery/{id}/edit', 'Admin\GalleryController@edit')->name('gallery.edit');
    Route::put('/gallery/{id}', 'Admin\GalleryController@update')->name('gallery.update');
    Route::delete('/gallery/{id}', 'Admin\GalleryController@destroy')->name('gallery.destroy');
    Route::get('/gallery/{id}/status', 'Admin\GalleryController@status')->name('gallery.status');
    Route::get('/gallery/{id}/show', 'Admin\GalleryController@show')->name('gallery.show');
    Route::post('/gallery/priority', 'Admin\GalleryController@priority')->name('gallery.priority');



    Route::get('/downloads', 'Admin\DownloadsController@index')->name('downloads.index');
    Route::get('/downloads/create', 'Admin\DownloadsController@create')->name('downloads.create');
    Route::post('/downloads', 'Admin\DownloadsController@store')->name('downloads.store');
    Route::get('/downloads/{id}/edit', 'Admin\DownloadsController@edit')->name('downloads.edit');
    Route::put('/downloads/{id}', 'Admin\DownloadsController@update')->name('downloads.update');
    Route::delete('/downloads/{id}', 'Admin\DownloadsController@destroy')->name('downloads.destroy');
    Route::get('/downloads/{id}/status', 'Admin\DownloadsController@status')->name('downloads.status');
    Route::get('/downloads/{id}/show', 'Admin\DownloadsController@show')->name('downloads.show');
    Route::post('/downloads/priority', 'Admin\DownloadsController@priority')->name('downloads.priority');


    Route::get('/content', 'Admin\ContentController@index')->name('content.index');
    Route::get('/content/create', 'Admin\ContentController@create')->name('content.create');
    Route::post('/content', 'Admin\ContentController@store')->name('content.store');
    Route::get('/content/{id}/edit', 'Admin\ContentController@edit')->name('content.edit');
    Route::put('/content/{id}', 'Admin\ContentController@update')->name('content.update');
    Route::delete('/content/{id}', 'Admin\ContentController@destroy')->name('content.destroy');
    Route::get('/content/{id}/status', 'Admin\ContentController@status')->name('content.status');
    Route::get('/content/{id}/show', 'Admin\ContentController@show')->name('content.show');
    Route::post('/content/priority', 'Admin\ContentController@priority')->name('content.priority');


    Route::get('/news', 'Admin\NewsController@index')->name('news.index');
    Route::get('/news/create', 'Admin\NewsController@create')->name('news.create');
    Route::post('/news', 'Admin\NewsController@store')->name('news.store');
    Route::get('/news/{id}/edit', 'Admin\NewsController@edit')->name('news.edit');
    Route::put('/news/{id}', 'Admin\NewsController@update')->name('news.update');
    Route::delete('/news/{id}', 'Admin\NewsController@destroy')->name('news.destroy');
    Route::get('/news/{id}/status', 'Admin\NewsController@status')->name('news.status');
    Route::get('/news/{id}/show', 'Admin\NewsController@show')->name('news.show');
    Route::post('/news/priority', 'Admin\NewsController@priority')->name('news.priority');

    
    Route::get('/faq', 'Admin\FaqController@index')->name('faq.index');
    Route::get('/faq/create', 'Admin\FaqController@create')->name('faq.create');
    Route::post('/faq', 'Admin\FaqController@store')->name('faq.store');
    Route::get('/faq/{id}/edit', 'Admin\FaqController@edit')->name('faq.edit');
    Route::put('/faq/{id}', 'Admin\FaqController@update')->name('faq.update');
    Route::delete('/faq/{id}', 'Admin\FaqController@destroy')->name('faq.destroy');
    Route::get('/faq/{id}/status', 'Admin\FaqController@status')->name('faq.status');
    Route::get('/faq/{id}/show', 'Admin\FaqController@show')->name('faq.show');
    Route::post('/faq/priority', 'Admin\FaqController@priority')->name('faq.priority');
    


    Route::get('/event', 'Admin\EventController@index')->name('event.index');
    Route::get('/event/create', 'Admin\EventController@create')->name('event.create');
    Route::post('/event', 'Admin\EventController@store')->name('event.store');
    Route::get('/event/{id}/edit', 'Admin\EventController@edit')->name('event.edit');
    Route::put('/event/{id}', 'Admin\EventController@update')->name('event.update');
    Route::delete('/event/{id}', 'Admin\EventController@destroy')->name('event.destroy');
    Route::get('/event/{id}/status', 'Admin\EventController@status')->name('event.status');
    Route::get('/event/{id}/show', 'Admin\EventController@show')->name('event.show');
    Route::post('/event/priority', 'Admin\EventController@priority')->name('event.priority');


    // Route::get('/zoneevent', 'Admin\ZoneEventController@index')->name('zoneevent.index');
    // Route::get('/zoneevent/create', 'Admin\ZoneEventController@create')->name('zoneevent.create');
    // Route::post('/zoneevent', 'Admin\ZoneEventController@store')->name('zoneevent.store');
    // Route::get('/zoneevent/{id}/edit', 'Admin\ZoneEventController@edit')->name('zoneevent.edit');
    // Route::put('/zoneevent/{id}', 'Admin\ZoneEventController@update')->name('zoneevent.update');
    // Route::delete('/zoneevent/{id}', 'Admin\ZoneEventController@destroy')->name('zoneevent.destroy');
    // Route::get('/zoneevent/{id}/status', 'Admin\ZoneEventController@status')->name('zoneevent.status');
    // Route::get('/zoneevent/{id}/show', 'Admin\ZoneEventController@show')->name('zoneevent.show');



    Route::get('/programs', 'Admin\ProgramsController@index')->name('programs.index');
    Route::get('/programs/create', 'Admin\ProgramsController@create')->name('programs.create');
    Route::post('/programs', 'Admin\ProgramsController@store')->name('programs.store');
    Route::get('/programs/{id}/edit', 'Admin\ProgramsController@edit')->name('programs.edit');
    Route::put('/programs/{id}', 'Admin\ProgramsController@update')->name('programs.update');
    Route::delete('/programs/{id}', 'Admin\ProgramsController@destroy')->name('programs.destroy');
    Route::get('/programs/{id}/status', 'Admin\ProgramsController@status')->name('programs.status');
    Route::get('/programs/{id}/show', 'Admin\ProgramsController@show')->name('programs.show');
    Route::post('/programs/priority', 'Admin\ProgramsController@priority')->name('programs.priority');


    Route::get('/team', 'Admin\TeamController@index')->name('team.index');
    Route::get('/team/create', 'Admin\TeamController@create')->name('team.create');
    Route::post('/team', 'Admin\TeamController@store')->name('team.store');
    Route::get('/team/{id}/edit', 'Admin\TeamController@edit')->name('team.edit');
    Route::put('/team/{id}', 'Admin\TeamController@update')->name('team.update');
    Route::delete('/team/{id}', 'Admin\TeamController@destroy')->name('team.destroy');
    Route::get('/team/{id}/status', 'Admin\TeamController@status')->name('team.status');
    Route::get('/team/{id}/show', 'Admin\TeamController@show')->name('team.show');
    Route::post('/team/priority', 'Admin\TeamController@priority')->name('team.priority');


    Route::get('/zone', 'Admin\ZoneController@index')->name('zone.index');
    Route::get('/zone/create', 'Admin\ZoneController@create')->name('zone.create');
    Route::post('/zone', 'Admin\ZoneController@store')->name('zone.store');
    Route::get('/zone/{id}/edit', 'Admin\ZoneController@edit')->name('zone.edit');
    Route::put('/zone/{id}', 'Admin\ZoneController@update')->name('zone.update');
    Route::delete('/zone/{id}', 'Admin\ZoneController@destroy')->name('zone.destroy');
    Route::get('/zone/{id}/status', 'Admin\ZoneController@status')->name('zone.status');
    Route::get('/zone/{id}/show', 'Admin\ZoneController@show')->name('zone.show');
    Route::post('/zone/priority', 'Admin\ZoneController@priority')->name('zone.priority');


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
    

    Route::get('/video', 'Admin\VideoController@index')->name('video.index');
    Route::get('/video/create', 'Admin\VideoController@create')->name('video.create');
    Route::post('/video', 'Admin\VideoController@store')->name('video.store');
    Route::get('/video/{id}/edit', 'Admin\VideoController@edit')->name('video.edit');
    Route::put('/video/{id}', 'Admin\VideoController@update')->name('video.update');
    Route::delete('/video/{id}', 'Admin\VideoController@destroy')->name('video.destroy');
    Route::get('/video/{id}/status', 'Admin\VideoController@status')->name('video.status');
    Route::get('/video/{id}/show', 'Admin\VideoController@show')->name('video.show');
    Route::post('/video/priority', 'Admin\VideoController@priority')->name('video.priority');
   


    Route::get('/challenge', 'Admin\ChallengeController@index')->name('challenge.index');
    Route::get('/challenge/create', 'Admin\ChallengeController@create')->name('challenge.create');
    Route::post('/challenge', 'Admin\ChallengeController@store')->name('challenge.store');
    Route::get('/challenge/{id}/edit', 'Admin\ChallengeController@edit')->name('challenge.edit');
    Route::put('/challenge/{id}', 'Admin\ChallengeController@update')->name('challenge.update');
    Route::delete('/challenge/{id}', 'Admin\ChallengeController@destroy')->name('challenge.destroy');
    Route::get('/challenge/{id}/status', 'Admin\ChallengeController@status')->name('challenge.status');
    Route::get('/challenge/{id}/show', 'Admin\ChallengeController@show')->name('challenge.show');
    Route::post('/challenge/priority', 'Admin\ChallengeController@priority')->name('challenge.priority');


    Route::get('/eventGallery', 'Admin\EventgalleryController@index')->name('eventGallery.index');
    Route::get('/eventGallery/create', 'Admin\EventgalleryController@create')->name('eventGallery.create');
    Route::post('/eventGallery', 'Admin\EventgalleryController@store')->name('eventGallery.store');
    Route::get('/eventGallery/{id}/edit', 'Admin\EventgalleryController@edit')->name('eventGallery.edit');
    Route::put('/eventGallery/{id}', 'Admin\EventgalleryController@update')->name('eventGallery.update');
    Route::delete('/eventGallery/{id}', 'Admin\EventgalleryController@destroy')->name('eventGallery.destroy');
    Route::get('/eventGallery/{id}/status', 'Admin\EventgalleryController@status')->name('eventGallery.status');
    Route::get('/eventGallery/{id}/show', 'Admin\EventgalleryController@show')->name('eventGallery.show');
    Route::post('/eventGallery/priority', 'Admin\EventgalleryController@priority')->name('eventGallery.priority');


});

//Auth::routes();



