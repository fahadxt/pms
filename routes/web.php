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

Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function () {
    // Route::resource('projects','ProjectsController');
    // Route::post('/upload', 'ProjectsController@upload')->name('projects.upload');
    // Route::get('/dashboard', 'DashboardController@index')->name('dashboard.index');
    Route::livewire('/', 'home')->name('home');
    Route::livewire('/projects', 'projects.index')->name('projects.index');
    Route::livewire('/projects/{id}', 'projects.show')->name('projects.show');
    Route::livewire('/dashboard', 'dashboard')->name('dashboard.index');

});

Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
