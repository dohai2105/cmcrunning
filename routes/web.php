<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/detailRanking/{teamId}', 'HomeController@detailRanking')->name('detailRanking');
Route::get('/individualRaking', 'HomeController@individualRanking')->name('individualRanking');
Route::get('/teamRanking', 'HomeController@teamRanking')->name('teamRanking');
