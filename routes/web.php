<?php


Route::get('/', function () {
    return view('welcome');
});




Route::get('/add', function() {
    return \App\User::find(8)->add_friend(1);
});

Route::get('/accept', function() {
    return \App\User::find(6)->accept_friend(1);
});

Route::get('/friends', function() {
    return \App\User::find(1)->get_friends();
});

Route::get('/pending', function() {
    return \App\User::find(1)->get_pending_requests();
});




Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function() {

    Route::get('/profile/edit', [
        'uses' => 'ProfilesController@edit',
        'as' => 'profile.edit'
    ]);


    Route::post('/profile/update', [
        'uses' => 'ProfilesController@update',
        'as' => 'profile.update'
    ]);

    Route::get('/profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);

});