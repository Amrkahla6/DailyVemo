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
})->name('frontend.landing');

Route::namespace('Backend')->prefix('admin')->middleware(['admin'])->group(function(){

    // Home Route
    Route::get('home', 'HomeController@index')->name('admin.home');

    // Users Routes
    Route::resource('users', 'UserController')->except(['show']);

    // categories Routes
    Route::resource('categories', 'CategoryController')->except(['show']);

    // skills Routes
    Route::resource('skills', 'SkillController')->except(['show']);

    // Tags Routes
    Route::resource('tags', 'TagController')->except(['show']);

    // pages Routes
    Route::resource('pages', 'PageController')->except(['show']);

    // videos Routes
    Route::resource('videos', 'VideoController')->except(['show']);

    Route::post('comments' , 'VideoController@commentStore')->name('comments.store');

    Route::post('comments/{id}' , 'VideoController@commentUpdate')->name('comments.update');

    Route::get('comments/{id}' , 'VideoController@commentDelete')->name('comments.delete');


});// end of admin routes


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('category/{id}', 'HomeController@category')->name('front.category');
Route::get('skill/{id}', 'HomeController@skills')->name('front.skill');
Route::get('tag/{id}', 'HomeController@tags')->name('front.tag');
Route::get('video/{id}', 'HomeController@video')->name('frontend-video');

Route::middleware(['auth'])->group(function(){

Route::post('comments/{id}', 'HomeController@commentUpdate')->name('front.commentUpdate');
Route::post('comments/{id}/create', 'HomeController@commentStore')->name('front.commentStore');

});
