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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::view('/users', 'users.showAll')->name('user.all');

Route::get('/game', 'GameController@showGame')->name('game.show');

Route::get('/chat', 'ChatController@showChat')->name('chat.show');
Route::post('/chat/message', 'ChatController@messageReceived')->name('chat.message');
Route::post('/chat/greet/{user}', 'ChatController@greetReceived')->name('chat.greet');
