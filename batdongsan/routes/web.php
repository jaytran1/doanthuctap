<?php

use Illuminate\Support\Facades\Route;
use App\User;
use App\Khach;
use App\LoaiBDS;
use App\Http\Controllers\KhachController;
use App\Http\Controllers\LoaiBDSController;
use App\Http\Controllers\BDSController;
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
    return view('main.trangchu');
});

Route::get('/admin/login', function () {
    return view('admin.login');
});


Route::get('/admin', function () {
	$user = User::all();
	return view('admin.user.danhsach',['user'=>$user]);
 });

//////////////////////////////////////////////////////
Route::get('/','App\Http\Controllers\TrangchuController@getBds');

//////////////////////////////////////////////////////
Route::get('/admin/login','App\Http\Controllers\UserController@getDangnhapAdmin');
Route::post('/admin/login','App\Http\Controllers\UserController@postDangnhapAdmin');
Route::get('/admin/logout','App\Http\Controllers\UserController@getDangxuatAdmin');

//Route::get('/admin/login',[UserController::class, 'getDangnhapAdmin']);
//Route::post('/admin/login',[UserController::class, 'postDangnhapAdmin']);
//Route::get('/admin/logout',[UserController::class, 'getDangxuatAdmin']);

//////////////////////////////////////////////////////
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'], function () {
		Route::group(['prefix'=>'user'],function(){
			Route::get('danhsach','App\Http\Controllers\UserController@getDanhSach');

			Route::get('them','App\Http\Controllers\UserController@getThem');
			Route::post('them','App\Http\Controllers\UserController@postThem');

			Route::get('sua/{id}','App\Http\Controllers\UserController@getSua');
			Route::post('sua/{id}','App\Http\Controllers\UserController@postSua');

			Route::get('xoa/{id}','App\Http\Controllers\UserController@getXoa');
		});

		Route::group(['prefix'=>'khach'],function(){
			Route::get('danhsach','App\Http\Controllers\KhachController@getDanhSach');

			Route::get('them','App\Http\Controllers\KhachController@getThem');
			Route::post('them','App\Http\Controllers\KhachController@postThem');

			Route::get('sua/{id}','App\Http\Controllers\KhachController@getSua');
			Route::post('sua/{id}','App\Http\Controllers\KhachController@postSua');

			Route::get('xoa/{id}','App\Http\Controllers\KhachController@getXoa');

			Route::get('info/{id}','App\Http\Controllers\KhachController@getInfo');
		});

		Route::group(['prefix'=>'loaibds'],function(){
			Route::get('danhsach','App\Http\Controllers\LoaiBDSController@getDanhSach');

			Route::get('them','App\Http\Controllers\LoaiBDSController@getThem');
			Route::post('them','App\Http\Controllers\LoaiBDSController@postThem');

			Route::get('sua/{id}','App\Http\Controllers\LoaiBDSController@getSua');
			Route::post('sua/{id}','App\Http\Controllers\LoaiBDSController@postSua');

			Route::get('xoa/{id}','App\Http\Controllers\LoaiBDSController@getXoa');
		});

		Route::group(['prefix'=>'bds'],function(){
			Route::get('danhsach','App\Http\Controllers\BDSController@getDanhSach');

			Route::get('them','App\Http\Controllers\BDSController@getThem');
			Route::post('them','App\Http\Controllers\BDSController@postThem');

			Route::get('sua/{id}','App\Http\Controllers\BDSController@getSua');
			Route::post('sua/{id}','App\Http\Controllers\BDSController@postSua');

			Route::get('xoa/{id}','App\Http\Controllers\BDSController@getXoa');

			Route::get('hinh/{id}','App\Http\Controllers\BDSController@getHinh');
		});
 });