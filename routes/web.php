<?php

use App\Jobs\ExampleJob;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'EditUserProfileController')->name('profile.edit');
Route::put('/profile', 'UpdateUserProfileController')->name('profile.update');

Route::get('/users/{user}/pictures', 'ShowPicturesController');

Route::get('/matching','MatchingController');


//Test route
Route::get('/test', function () {
    dd(Storage::files('/public/picturesCollection'));
});
