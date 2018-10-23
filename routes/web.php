<?php


Route::get('/', function () {
    return view('welcome');
});

// Route::get('/is', function() {
//     return \App\User::find(1)->isFriendsWith(2);
// });

// Route::get('/delete', function() {
//     return \App\User::find(1)->deleteFriend(2);
// });

// Route::get('/has', function() {
//     return \App\User::find(1)->hasPendingRequestFrom(5);
// });
// Route::get('/accept', function() {
//     return \App\User::find(1)->acceptFriend(4);
// });

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

    Route::get('/check_relationship_status/{id}', [
        'uses' => 'FriendshipsController@check',
        'as' => 'check'
    ]);

    Route::get('/add_friend/{id}', [
        'uses' => 'FriendshipsController@addFriend',
        'as' => 'add_friend'
    ]);

    Route::get('/accept_friend/{id}', [
        'uses' => 'FriendshipsController@acceptFriend',
        'as' => 'accept_friend'
    ]);

    Route::delete('/delete_friend/{id}', [
        'uses' => 'FriendshipsController@deleteFriend',
        'as' => 'delete_friend'
    ]);

    Route::get('/connections', [
        'uses' => 'FriendshipsController@getAllConnections',
        'as' => 'get_connections'
    ]);
});