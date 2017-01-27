<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//witch ( ['nazwa_w_widoku'=>$zmienna])
//$zmienna ...... view compat('zmienna') to sam CO TABLICA WYŻEJ


Auth::routes();
Route::get('/serach', 'SerachController@users'); //q=dsdsadASDAD
Route::get('/home', 'HomeController@index');
Route::resource('/users', 'UsersController', ['except' => ['index', 'create', 'store']]);
//Route::resource('/frieds', 'FriednsController', ['except' => ['create', 'edit', 'show']]);
Route::get('/users/{user}/friends', 'FriendsController@index');
Route::post('/friends/{firends}', 'FriendsController@add');
Route::patch('/friends/{firends}', 'FriendsController@accept');
Route::delete('/friends/{firends}', 'FriendsController@destroy');
//Route::resource('/users', 'UsersController', ['except' => ['index', 'create', 'store']])->middleware('auth');
Route::get('/images/users-avatar/{id}/{size}', 'ImagesController@UserAvatar');


Route::resource('/posts', 'PostsController', ['except' => ['index', 'create']]); //R
