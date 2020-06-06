<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/profile', 'UserController@index')->name('user.profile');
Route::get('/profile/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/profile/{user}', 'UserController@update')->name('user.update');
Route::get('/all/{user}', 'UserController@show')->name('user.show');
Route::get('profile/matches', 'UserController@match')->name('user.matches');
Route::get('all/{user}/profile', 'UserController@showDateUser')->name('user.date.profile');


Route::get('all/{user}/filter', 'UserController@userFilter')->name('user.filter');
Route::patch('all/{user}/filter', 'UserController@userFilterUpdate')->name('user.filter.update');


Route::get('/profile/{user}/password', 'UserController@toPassword')->name('user.password');
Route::patch('/profile/{user}/password', 'UserController@updatePassword')->name('user.passwordUpdate');


Route::get('profile/{user}/email', 'UserController@toEmail')->name('user.email');
Route::patch('/profile/{user}/email', 'UserController@userEmailUpdate')->name('user.emailUpdate');


Route::get('/profile/{user}/picture','UserController@profilePicture')->name('user.profile.picture');
Route::patch('/profile/{user}/picture', 'UserController@uploadPicture')->name('user.uploadPicture'); // profile picture


Route::post('all/{user}/like', 'RatingController@like')->name('user.like');
Route::post('all/{user}/dislike', 'RatingController@dislike')->name('user.dislike');


Route::get('profile/{user}/gallery','GalleryController@index')->name('gallery.index');
Route::post('profile/{user}/gallery','GalleryController@store')->name('gallery.store');
Route::delete('profile/{gallery}', 'GalleryController@destroy')->name('gallery.destroy'); // check for fixes







