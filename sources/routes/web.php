<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\Livewire;

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

Route::middleware('guest')->group(function() {
    Route::get('/login', 'AuthController@index')->name('login');
    Route::post('/login', 'AuthController@store')->name('login');
    
});

Route::middleware('auth')->group(function() {

    //DASHBOARD
    Route::get('/', 'DashboardController@index')->name('dashboard');
    Route::get('/dashboard', 'DashboardController@index');

    Route::get('/hospital', 'HospitalController@index');

    //Stase
    Route::get('/stase', 'StaseController@index')->name('stase');
    Route::post('/stase-post', 'StaseController@store')->name('stase');

    //PAGE Transaction
    Route::get('trx-tindakan', 'PortofolioController@tindakan')->name('trx-tindakan');
    Route::post('post-tindakan', 'PortofolioController@post_tindakan')->name('post-tindakan');

    Route::get('trx-case-report', 'PortofolioController@case_report')->name('trx-case-report');
    Route::get('trx-karya-ilmiah', 'PortofolioController@karya_ilmiah')->name('trx-karya-ilmiah');
    Route::get('trx-extrakulikuler', 'PortofolioController@extrakulikuler')->name('trx-extrakulikuler');
    
    Route::get('nilai-ppds', 'ScoreController@index')->name('nilai-ppds');
    Route::get('nilai-ppds-portofolio/{id}', 'ScoreController@ppds_portofolio')->name('nilai-ppds-portofolio');

    //LOGOUT
    Route::post('/logout', 'AuthController@logout')->name('logout');
});