<?php


Route::get('/', function () {
    return view('welcome');
});




Route::get('/add_friend', function() {
    return \App\User::find(1)->addFriend(5);
});

Route::get('/accept_friend', function() {
    return \App\User::find(1)->acceptFriend(5);
});

Route::get('/friends', function() {
    return \App\User::find(1)->getFriends();
});

Route::get('/ids', function() {
    return \App\User::find(1)->getFriendsId();
});

Route::get('/pending', function() {
    return \App\User::find(1)->getPendingRequests();
});

Route::get('/isFriend', function() {
    return \App\User::find(1)->isFriendsWith(10);
});

Route::get('/has', function() {
    return \App\User::find(1)->hasPendingRequestFrom(2);
});

Route::get('/sent', function() {
    return \App\User::find(1)->getPendingRequestSent();
});

Route::get('/count', function() {
    return \App\User::find(1)->countFriends();
});

Route::get('/cancle', function() {
    return \App\User::find(1)->canclePendingRequest(3);
});

Route::get('/talents', function() {
    return \App\User::find(1)->getAllTalents();
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

    Route::post('/snippet/add', [
        'uses' => 'ProfilesController@addSnippet',
        'as' => 'snippet.add'
    ]);

    Route::get('/profile/{slug}', [
        'uses' => 'ProfilesController@index',
        'as' => 'profile'
    ]);

    Route::get('/snippet/{id}/edit', [
        'uses' => 'ProfilesController@snippetEdit',
        'as' => 'snippet.edit'
    ]);
    Route::post('/snippet/{id}/update', [
        'uses' => 'ProfilesController@snippetUpdate',
        'as' => 'snippet.update'
    ]);
    Route::get('/snippet/{id}/delete', [
        'uses' => 'ProfilesController@deleteSnippet',
        'as' => 'snippet.delete'
    ]);
});