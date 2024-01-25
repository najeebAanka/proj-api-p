<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
  |--------------------------------------------------------------------------
  | API Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register API routes for your application. These
  | routes are loaded by the RouteServiceProvider within a group which
  | is assigned the "api" middleware group. Enjoy building your API!
  |
 */



Route::group(
        ['prefix' => 'v1/'],
        function () {


   Route::get('init', function () {
    $response = new stdClass();
    $response->min_version = 6;
    $response->wallet_only = true;
    return response()->json($response);

                  });



            Route::get('news', [App\Http\Controllers\Api\NewsController::class, 'index']);
            Route::get('blog', [App\Http\Controllers\Api\BlogsController::class, 'index']);
            Route::get('products', [App\Http\Controllers\Api\ProductsController::class, 'index']);
            Route::get('products/single/{id}', [App\Http\Controllers\Api\ProductsController::class, 'single']);


          //   Route::get('cmd', function(){

          //     Artisan::call("storage:link");
          //  });



            //--------------


            Route::get('countries', [App\Http\Controllers\Api\GoldPricesController::class, 'countries']);
            Route::get('article/single/{id}', [App\Http\Controllers\Api\ArticleController::class, 'index']);
            Route::post('contact-us', [App\Http\Controllers\Api\ContactController::class, 'submit']);

            //-----------------------------



            Route::post('login', [\App\Http\Controllers\Api\UsersController::class, 'login']);
            Route::post('signup', [\App\Http\Controllers\Api\UsersController::class, 'signup']);

                 Route::get('about', function () {
    return \Illuminate\Support\Facades\Redirect::to('https://sab_test.net/about/');
                  });
                        Route::get('/', function () {
    return \Illuminate\Support\Facades\Redirect::to('https://sab_test.net/about/');
                  });


        });
//---------------

            Route::group(['prefix' => 'v1/','middleware' => ['auth:api']], function () {

            Route::post('save-spending', [App\Http\Controllers\Api\SpendingsController::class, 'submit']);
            Route::post('delete-spending/{id}', [App\Http\Controllers\Api\SpendingsController::class, 'remove']);
            Route::get('spendings', [App\Http\Controllers\Api\SpendingsController::class, 'list']);
            Route::get('spendings-chart', [App\Http\Controllers\Api\SpendingsController::class, 'chart']);
              Route::get('logout', [\App\Http\Controllers\Api\UsersController::class, 'logout']);

     });

