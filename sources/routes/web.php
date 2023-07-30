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
    Route::post('post-case-report', 'PortofolioController@post_case_report')->name('post-case-report');
    Route::post('post-karya', 'PortofolioController@post_karya')->name('post-karya');
    Route::post('post-extrakulikuler', 'PortofolioController@post_extrakulikuler')->name('post-extrakulikuler');
    Route::post('approve-portofolio', 'PortofolioController@approve_portofolio')->name('approve-portofolio');
    Route::post('verified-portofolio', 'PortofolioController@verified_portofolio')->name('verified-portofolio');
    Route::post('revision-portofolio', 'PortofolioController@revision_portofolio')->name('revision-portofolio');

    Route::get('trx-case-report', 'PortofolioController@case_report')->name('trx-case-report');
    Route::get('trx-karya-ilmiah', 'PortofolioController@karya_ilmiah')->name('trx-karya-ilmiah');
    Route::get('trx-extrakulikuler', 'PortofolioController@extrakulikuler')->name('trx-extrakulikuler');
    
    Route::get('penilaian-supervisor', 'ScoreController@index')->name('penilaian-supervisor');
    Route::get('nilai-ppds-portofolio/{id}', 'ScoreController@ppds_portofolio')->name('nilai-ppds-portofolio');

    Route::get('profile-ppds', 'UserController@profile_ppds')->name('profile-ppds');
    Route::get('profile-supervisor', 'UserController@profile_supervisor')->name('profile-supervisor');
    Route::post('user-post', 'UserController@store')->name('user-post');

    //LOGOUT
    Route::post('/logout', 'AuthController@logout')->name('logout');
});