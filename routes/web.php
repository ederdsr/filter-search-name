<?php

Route::get('users', ['as' => 'users.index',  'uses' => 'UsersController@index']);

Route::get('/', function () {
    return redirect()->route('users.index');
});
