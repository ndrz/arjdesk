<?php

use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\RoleController as Roleses;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Route::middleware(['has.role'],)->prefix('xyz')->group(function () {
//     Route::view('dashboard', 'dashboard')->name('dashboard');

//     Route::prefix('role-permission')->namespace('Permissions')->group(function(){
//         Route::get('roles', 'RoleController@index')->name('roles.index');
//     });
    
// });


Route::group(['middleware' => ['auth','has.role'],'prefix'=>'xyz'], function() {
   

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);

    Route::group(['middleware' => ['role:administrator|admin']], function () {
        Route::prefix('role-permission')->namespace('App\Http\Controllers\Permissions')->group(function(){
            
            Route::get('assign', 'AssignController@create')->name('assign.create');
            Route::post('assign', 'AssignController@store');


            Route::prefix('roles')->group(function(){
                Route::get('', 'RoleController@index')->name('roles.index');
                Route::post('create', 'RoleController@store')->name('roles.create');
                Route::get('{role}/edit', 'RoleController@edit')->name('roles.edit');
                Route::put('{role}/edit', 'RoleController@update'); 
            });

            Route::prefix('permissions')->group(function(){
                Route::get('', 'PermissionController@index')->name('permission.index');
                Route::post('create','PermissionController@store')->name('permission.create');
                Route::get('{permission}/edit', 'PermissionController@edit')->name('permission.edit');
                Route::put('{permission}/edit', 'PermissionController@update'); 
            });
          
            
    
     });
    });
        
    //Route::resource('roles', Roleses::class);
});




