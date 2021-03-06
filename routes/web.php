<?php


Route::get('/', 'MicropostsController@index');
    
Route::get('signup', 'Auth\RegisterController@showRegistrationForm')->name('signup.get');//controlerにshowファンクションなくない？笑
Route::post('signup', 'Auth\RegisterController@register')->name('signup.post');//registerファンクションもなくない？

Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login')->name('login.post');
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('users', 'UsersController', ['only' => ['index', 'show']]);
    Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);
});


Route::group(['prefix' => 'users/{id}'], function () {
Route::post('follow', 'UserFollowController@store')->name('user.follow');
Route::delete('unfollow', 'UserFollowController@destroy')->name('user.unfollow');
Route::get('followings', 'UsersController@followings')->name('users.followings');
Route::get('followers', 'UsersController@followers')->name('users.followers');

Route::post('like', 'UserFavoritesController@store')->name('user.like');
Route::delete('unlike', 'UserFavoritesController@destroy')->name('user.dislike');
Route::get('liking', 'UsersController@liking')->name('users.likings');
    });

Route::resource('microposts', 'MicropostsController', ['only' => ['store', 'destroy']]);