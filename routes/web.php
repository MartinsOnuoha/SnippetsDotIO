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

    Route::get('/cancle_request/{id}', [
        'uses' => 'FriendshipsController@cancleRequest',
        'as' => 'get_connections'
    ]);

    Route::get('/connections', [
        'uses' => 'FriendshipsController@getAllConnections',
        'as' => 'get_connections'
    ]);

    Route::get('/discover', [
        'uses' => 'HomeController@discover',
        'as' => 'discover'
    ]);

    Route::get('/waiting_requests', [
        'uses' => 'FriendshipsController@getPendingConnections',
        'as' => 'get_pending'
    ]);

    Route::get('/get_likes/{id}', [
        'uses' => 'SnippetController@getLikes',
        'as' => 'get_likes'
    ]);

    Route::get('/like_snippet/{id}', [
        'uses' => 'SnippetController@likeSnippet',
        'as' => 'like_snippet'
    ]);

    Route::get('/unlike_snippet/{id}', [
        'uses' => 'SnippetController@unlikeSnippet',
        'as' => 'like_snippet'
    ]);
});