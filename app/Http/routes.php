<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/about', function () {
    return view('about');
    
});

Route::get('/','PagesController@home');
Route::get('/about/{name}','PagesController@about');
Route::get('/contact','PagesController@contact');

Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

use \App\User;
use \App\Blog;

Route::get('/user',function(){
	dd(User::all());
});
Route::get('/blog/create',function(){
	$blog = new Blog;
	$blog->name= "First Blog";
	$blog->description= "First Blog";
	$blog->save();
});

Route::get('/blog',function(){
	return Blog::all();
});

Route::get('/blog/{id}',function($id){
	$blog = Blog::find($id);
	return $blog;
});
Route::get('/blog/t/{tit}',function($tit){
	$blog = Blog::where('name', "=", $tit)->get();
	return $blog;
});

