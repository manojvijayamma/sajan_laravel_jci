<?php

use Illuminate\Http\Request;

header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization ,no-auth, x-xsrf-token');



//Route::post('register', 'AuthController@register');
//Route::post('login', 'AuthController@login');
//Route::post('recover', 'AuthController@recover');

Route::group(['middleware' => ['cors']], function () {    
        Route::get('banners', 'Api\BannerController@banner'); 
        Route::get('featured', 'Api\ProductsController@featured');  
        Route::get('offers', 'Api\ProductsController@offers');
        Route::get('new', 'Api\ProductsController@newProducts');
        Route::get('products', 'Api\ProductsController@products');
        Route::get('product/{id}', 'Api\ProductsController@details');

        Route::get('category', 'Api\CategoryController@category');
        Route::get('category/{id}', 'Api\CategoryController@subcategory');

        Route::post('login', 'Auth\ApiLoginController@login');
        Route::post('register', 'Auth\RegisterController@create');   


            
});


Route::group(['middleware' => ['jwt.auth','cors']], function() {
   // Route::post('register', 'Api\UserController@store');
    Route::get('logout', 'AuthController@logout');
    Route::get('user', 'Api\UserController@index');

    Route::get('profile', 'Api\UserController@getProfile');
    Route::post('profile', 'Api\UserController@profile');
    Route::post('password', 'Api\UserController@password');

   

    Route::get('order', 'Api\OrdersController@index');
    Route::post('order', 'Api\OrdersController@save');
    Route::get('order/{id}', 'Api\OrdersController@details');   



    //api/test
    Route::get('test', function(){
        return response()->json(['foo'=>'bar']);
    });

});



