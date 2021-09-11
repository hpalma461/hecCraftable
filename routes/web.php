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

Route::get('/', function () {
    return view('welcome');
});


/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('admin-users')->name('admin-users/')->group(static function() {
            Route::get('/',                                             'AdminUsersController@index')->name('index');
            Route::get('/create',                                       'AdminUsersController@create')->name('create');
            Route::post('/',                                            'AdminUsersController@store')->name('store');
            Route::get('/{adminUser}/impersonal-login',                 'AdminUsersController@impersonalLogin')->name('impersonal-login');
            Route::get('/{adminUser}/edit',                             'AdminUsersController@edit')->name('edit');
            Route::post('/{adminUser}',                                 'AdminUsersController@update')->name('update');
            Route::delete('/{adminUser}',                               'AdminUsersController@destroy')->name('destroy');
            Route::get('/{adminUser}/resend-activation',                'AdminUsersController@resendActivationEmail')->name('resendActivationEmail');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::get('/profile',                                      'ProfileController@editProfile')->name('edit-profile');
        Route::post('/profile',                                     'ProfileController@updateProfile')->name('update-profile');
        Route::get('/password',                                     'ProfileController@editPassword')->name('edit-password');
        Route::post('/password',                                    'ProfileController@updatePassword')->name('update-password');
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('adscipciones1s')->name('adscipciones1s/')->group(static function() {
            Route::get('/',                                             'Adscipciones1Controller@index')->name('index');
            Route::get('/create',                                       'Adscipciones1Controller@create')->name('create');
            Route::post('/',                                            'Adscipciones1Controller@store')->name('store');
            Route::get('/{adscipciones1}/edit',                         'Adscipciones1Controller@edit')->name('edit');
            Route::post('/bulk-destroy',                                'Adscipciones1Controller@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adscipciones1}',                             'Adscipciones1Controller@update')->name('update');
            Route::delete('/{adscipciones1}',                           'Adscipciones1Controller@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('adscripciones1s')->name('adscripciones1s/')->group(static function() {
            Route::get('/',                                             'Adscripciones1Controller@index')->name('index');
            Route::get('/create',                                       'Adscripciones1Controller@create')->name('create');
            Route::post('/',                                            'Adscripciones1Controller@store')->name('store');
            Route::get('/{adscripciones1}/edit',                        'Adscripciones1Controller@edit')->name('edit');
            Route::post('/bulk-destroy',                                'Adscripciones1Controller@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adscripciones1}',                            'Adscripciones1Controller@update')->name('update');
            Route::delete('/{adscripciones1}',                          'Adscripciones1Controller@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('adscripciones2s')->name('adscripciones2s/')->group(static function() {
            Route::get('/',                                             'Adscripciones2Controller@index')->name('index');
            Route::get('/create',                                       'Adscripciones2Controller@create')->name('create');
            Route::post('/',                                            'Adscripciones2Controller@store')->name('store');
            Route::get('/{adscripciones2}/edit',                        'Adscripciones2Controller@edit')->name('edit');
            Route::post('/bulk-destroy',                                'Adscripciones2Controller@bulkDestroy')->name('bulk-destroy');
            Route::post('/{adscripciones2}',                            'Adscripciones2Controller@update')->name('update');
            Route::delete('/{adscripciones2}',                          'Adscripciones2Controller@destroy')->name('destroy');
        });
    });
});

/* Auto-generated admin routes */
Route::middleware(['auth:' . config('admin-auth.defaults.guard'), 'admin'])->group(static function () {
    Route::prefix('admin')->namespace('App\Http\Controllers\Admin')->name('admin/')->group(static function() {
        Route::prefix('grados')->name('grados/')->group(static function() {
            Route::get('/',                                             'GradosController@index')->name('index');
            Route::get('/create',                                       'GradosController@create')->name('create');
            Route::post('/',                                            'GradosController@store')->name('store');
            Route::get('/{grado}/edit',                                 'GradosController@edit')->name('edit');
            Route::post('/bulk-destroy',                                'GradosController@bulkDestroy')->name('bulk-destroy');
            Route::post('/{grado}',                                     'GradosController@update')->name('update');
            Route::delete('/{grado}',                                   'GradosController@destroy')->name('destroy');
        });
    });
});