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


Route::get('/', [
    'as' => 'home', 'uses' => 'HomeController@home'
]);

Route::post('/user/create', [
    'as' => 'createUser', 'uses' => 'UserController@createUser'
]);

Route::post('/user/login', [
    'as' => 'login', 'uses' => 'UserController@login'
]);

Route::get('user/home/{id}', [
    'as' => 'userHome',
    'uses' => 'UserController@userHome',
    function ($id) {
}]);

Route::post('/picture/upload', [
    'as' => 'uploadPicture', 'uses' => 'PictureController@uploadPicture'
]);


Route::get('/error', function () {
    return "error uploading picture";
});

Route::get('picture/delete/{pictureId}', [
    'as' => 'pictureDelete',
    'uses' => 'PictureController@pictureDelete',
    function ($pictureId) {
}]);