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

Route::get('/',function(){
	return view('layout');
})->name('dashboard');
Route::prefix('cau-hoi')->group(function(){
	Route::prefix('thung-rac')->group(function(){
		Route::get('','CauHoiController@onlyTrashed')->name('cauhoi.thungrac');
		Route::get('/khoi-phuc/{id}','CauHoiController@restore');
		Route::get('/xoa/{id}','CauHoiController@forceDelete');
	});
	Route::get('/them-moi',function(){
		return view('them-moi-cau-hoi');
	})->name('cauhoi.themmoi');

	Route::get('xoa/{id}','CauHoiController@Delete');
	Route::get('','CauHoiController@create')->name('cauhoi');
	Route::get('/{id}','CauHoiController@show')->name('cauhoi.get');
	Route::post('/{id}','CauHoiController@update')->name('cauhoi.capnhat');
	Route::post('','CauHoiController@store')->name('cauhoi.themmoipost');

});
Route::prefix('linh-vuc')->group(function(){
	Route::prefix('thung-rac')->group(function(){
		Route::get('','LinhVucController@onlyTrashed')->name('linhvuc.thungrac');
		Route::get('/khoi-phuc/{id}','LinhVucController@restore');
		Route::get('/xoa/{id}','LinhVucController@forceDelete');
	});
	Route::get('/them-moi',function(){
		return view('them-moi-linh-vuc');
	})->name('linhvuc.themmoi');
	Route::get('/', 'LinhVucController@create')->name('linhvuc');
	Route::get('/{id}','LinhVucController@show')->name('linhvuc.get');
	Route::get('xoa/{id}','LinhVucController@Delete');
	Route::post('/{id}','LinhVucController@update')->name('linhvuc.capnhat');
	Route::post('','LinhVucController@store')->name('linhvuc.themmoipost');
});
Route::prefix('nguoi-choi')->group(function(){
	Route::prefix('thung-rac')->group(function(){
		Route::get('','NguoiChoiController@onlyTrashed')->name('nguoichoi.thungrac');
		Route::get('/khoi-phuc/{id}','NguoiChoiController@restore');
		Route::get('/xoa/{id}','NguoiChoiController@forceDelete');
	});
	// Route::get('/them-moi',function(){
	// 	return view('them-moi-nguoi-choi');
	// })->name('nguoichoi.themmoi');
	Route::get('/', 'NguoiChoiController@create')->name('nguoichoi');
	Route::get('xoa/{id}','NguoiChoiController@Delete');
	Route::post('','NguoiChoiController@store')->name('nguoichoi.themmoipost');
});