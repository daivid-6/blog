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

Route::get('/', function () {
    return view('welcome');
});
Route::group(['namespace'=>'Home','middleware'=>'login'],function(){
    Route::get('login','LoginController@index');
    Route::post('login/check','LoginController@check');
    Route::get('json','LoginController@sendJson');
    Route::get('insert','LoginController@addUser');
});
Route::get('test',function(){
   return '这是测试';
});
Route::get('tests',function(){
   return "<a href='login'>登陆</a>";
});

Route::group(['namespace'=>'Admin'],function(){
    Route::get('user','UserController@index');
    Route::get('wen','UserController@huoqu');

});

Route::group(['namespace'=>'Info'],function(){
    Route::get('insertsd/{num}','UserDbController@inserts');
    Route::get('deletesd/{num}','UserDbController@deletes');
    Route::get('updatesd/{num}','UserDbController@updates');
    Route::get('selectsd/{num}','UserDbController@selects');

    Route::get('insertso/{num}','UserOrmController@inserts');
    Route::get('deleteso/{num}','UserOrmController@deletes');
    Route::get('updateso/{num}','UserOrmController@updates');
    Route::get('selectso/{num}','UserOrmController@selects');
});
