<?php

use App\Http\Controllers\Dashboard\BlocksController;
use App\Http\Controllers\Dashboard\SectionsController;
use App\Http\Controllers\Dashboard\AppSettingsController;
use App\Http\Controllers\Dashboard\CountriesController;
use App\Http\Controllers\Dashboard\ProductsController;
use App\Http\Controllers\Dashboard\BlogsController;
use App\Http\Controllers\Dashboard\BlogsMediaController;
use App\Http\Controllers\Dashboard\AdminController;
use App\Http\Controllers\Dashboard\GoldPriceController;
use App\Http\Controllers\Dashboard\ResetPasswordController;
use Illuminate\Support\Facades\Auth;
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
Route::get('pages/gold-price', function () {
    return view('static.gold-prices');
});
Route::get('pages/currency-exchange', function () {
    return view('static.v2.currency-exchange');
});
Route::get('pages/unit-calc', function () {
    // return \Illuminate\Support\Facades\Redirect::to('https://codeincubator.github.io/gold-silver-calculator/');
    return view('static.v2.gold-calculator');
});

        Route::get('pages/about', function () {
  return view('static.v2.about');
                  });

                      Route::get('pages/terms', function () {
  return view('static.v2.terms');
                  });

                      Route::get('pages/privacy', function () {
  return view('static.v2.privacy');
                  });

  // Route::get('pages/gold-calculator', function () {
  //                   return view('gold-calculator');
  //                                   });


//--------------Dashboard-----------------------------------------------------------------------


Route::post('backend/login', 'App\Http\Controllers\Dashboard\AdminController@login');

Route::get('admin/login', function () {
    if(Auth::check()){
      return redirect('dashboard/home');
    }else
    return view('dashboard.login');

})->name('login');


Route::post('backend/reset-password', 'App\Http\Controllers\Dashboard\ResetPasswordController@resetPassword');



Route::group(
    ['middleware' => 'auth','prefix' => 'dashboard/'],
    function () {

      Route::get('logout', 'App\Http\Controllers\Dashboard\AdminController@logout')->name('logout');

      Route::get('home', function () {
        //  Illuminate\Support\Facades\Artisan::call('passport:install');
          
          return view('dashboard.home');
      });

        Route::get('/', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.welcome');
          });

          Route::get('/sections', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.sections');
          });

          Route::get('/single-section/{id}', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.single-section');
          });

          Route::get('/app-settings', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.app-settings');
          });

          Route::get('/countries', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.countries');
          });

          Route::get('/leads', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.leads');
          });

          Route::get('/products', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.products');
          });

          Route::get('/blogs', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.blogs');
          });

          Route::get('/single-blog/{id}', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.single-blog');
          });

          Route::get('/users', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.users');
          });

          Route::get('/reset-password', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.reset-password');
          });

          Route::get('/gold-prices', function () {
            //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
              return view('dashboard.gold-prices');
          });

          // Route::get('/login', function () {
          //   //  Illuminate\Support\Facades\Artisan::call('passport:install');
              
          //     return view('dashboard.login');
          // });
          
          //-------------------------


          Route::post('backend/sections/edit', [ SectionsController::class   ,'editItem'  ]);
          Route::post('backend/sections/delete', [ SectionsController::class   ,'deleteItem'  ]);
          Route::post('backend/sections/add', [ SectionsController::class   ,'addItem'  ]);


          Route::post('backend/blocks/edit', [ BlocksController::class   ,'editItem'  ]);
          Route::post('backend/blocks/delete', [ BlocksController::class   ,'deleteItem'  ]);
          Route::post('backend/blocks/add', [ BlocksController::class   ,'addItem'  ]);

          Route::post('backend/app-settings/edit', [ AppSettingsController::class   ,'editItem'  ]);
          Route::post('backend/app-settings/delete', [ AppSettingsController::class   ,'deleteItem'  ]);
          Route::post('backend/app-settings/add', [ AppSettingsController::class   ,'addItem'  ]);

          Route::post('backend/countries/edit', [ CountriesController::class   ,'editItem'  ]);
          Route::post('backend/countries/delete', [ CountriesController::class   ,'deleteItem'  ]);
          Route::post('backend/countries/add', [ CountriesController::class   ,'addItem'  ]);

          Route::post('backend/gold-prices/edit', [ GoldPriceController::class   ,'editItem'  ]);
          Route::post('backend/gold-prices/delete', [ GoldPriceController::class   ,'deleteItem'  ]);
          Route::post('backend/gold-prices/add', [ GoldPriceController::class   ,'addItem'  ]);

          Route::post('backend/products/edit', [ ProductsController::class   ,'editItem'  ]);
          Route::post('backend/products/delete', [ ProductsController::class   ,'deleteItem'  ]);
          Route::post('backend/products/add', [ ProductsController::class   ,'addItem'  ]);

          Route::post('backend/blogs/edit', [ BlogsController::class   ,'editItem'  ]);
          Route::post('backend/blogs/delete', [ BlogsController::class   ,'deleteItem'  ]);
          Route::post('backend/blogs/add', [ BlogsController::class   ,'addItem'  ]);

          Route::post('backend/blogs-media/delete', [ BlogsMediaController::class   ,'deleteItem'  ]);
          Route::post('backend/blogs-media/add', [ BlogsMediaController::class   ,'addItem'  ]);


    }
);            


Route::get('/', function () {
  //  Illuminate\Support\Facades\Artisan::call('passport:install');
    
    return view('welcome');
});
