<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('abc', function () {
    return 'def';
});

Route::get('test', 'TestController@index');

Route::get('form', function() {
    $token = csrf_token();
    echo <<<FORM
<form action="/form-handle" method="post">
    <input type="hidden" name="_token" value="{$token}">
    <input name="name" value="" />
    <input type="submit" name="submit" />
</form>
FORM;
});

Route::post('form-handle', function() {
   return '执行到这儿。';
});

Route::get('test1', 'TestController@test1');

Route::get('test2', 'TestController@test2');

Route::get('test3', 'TestController@test3');

Route::get('login', 'SecurityController@login');

Route::post('dologin', 'SecurityController@dologin');

