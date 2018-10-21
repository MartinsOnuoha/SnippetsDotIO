<?php


Route::get('/', function () {
    return view('welcome');
});




Route::get('/add_friend', function() {
    return \App\User::find(1)->addFriend(2);
});

Route::get('/accept_friend', function() {
    return \App\User::find(2)->acceptFriend(1);
});

Route::get('/friends', function() {
    return \App\User::find(1)->getFriends();
});

Route::get('/ids', function() {
    return \App\User::find(1)->getFriendsId();
});

Route::get('/pending', function() {
    return \App\User::find(2)->getPendingRequests();
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