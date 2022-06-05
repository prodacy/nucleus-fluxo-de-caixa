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


Route::get('/', function(){ return Redirect::route('pwa.home'); });
Route::get('/home', function(){ return Redirect::route('admin.home'); });


Route::group(['prefix'=>'app'],function(){
    Route::get('/', 'PwaController@index')->name('pwa.home');
});


Route::group(['prefix'=>'admin'],function(){

    Auth::routes();

    Route::middleware(['auth'])->group(function () {

        Route::get('/', 'HomeController@index')->name('admin.home');

        Route::group(['prefix'=>'bills'],function(){

            // metodologia mais flexivel 
            Route::get('/all', [App\Http\Controllers\BillController::class,'all'])->name('admin.bill.all');
            Route::get('/enter', [App\Http\Controllers\BillController::class,'enter'])->name('admin.bill.enter');
            Route::get('/out', [App\Http\Controllers\BillController::class,'out'])->name('admin.bill.out');

            Route::get('/create', [App\Http\Controllers\BillController::class,'create'])->name('admin.bill.create');
            Route::post('/store', [App\Http\Controllers\BillController::class,'store'])->name('admin.bill.store');
            Route::get('/edit/{id}', [App\Http\Controllers\BillController::class,'edit'])->name('admin.bill.edit');
            Route::post('/update/{id}', [App\Http\Controllers\BillController::class,'update'])->name('admin.bill.update');
            Route::get('/destroy/{id}', [App\Http\Controllers\BillController::class,'destroy'])->name('admin.bill.destroy');

        });

        Route::group(['prefix'=>'clients'],function(){

            // metodologia mais usual
            Route::get('/', 'ClientController@index')->name('admin.client.index');
            Route::get('/create', 'ClientController@create')->name('admin.client.create');
            Route::post('/store', 'ClientController@store')->name('admin.client.store');
            Route::get('/edit/{id}', 'ClientController@edit')->name('admin.client.edit');
            Route::post('/update/{id}', 'ClientController@update')->name('admin.client.update');
            Route::get('/destroy/{id}', 'ClientController@destroy')->name('admin.client.destroy');

        });

        Route::get('/profile', 'ProfileController@index')->name('profile');
        Route::put('/profile', 'ProfileController@update')->name('profile.update');

    });
});