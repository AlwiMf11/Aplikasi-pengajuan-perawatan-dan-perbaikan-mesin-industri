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
    return redirect('/login');
});


Route::get('layouts/layout', 'AdminController@layout'); 
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/daftar', 'DaftarController@index');
Route::post('/daftar/store', 'DaftarController@store');

Route::group(['middleware' => 'auth'], function(){


    

Route::group(['middleware' => 'admin'], function(){



Route::get('/user', 'UserController@index');
Route::get('/user_server_side', 'UserController@user_server_side');
Route::get('/user/tambah', 'UserController@tambah');
Route::post('/user/store', 'UserController@store');
Route::get('/user/edit/{id}', 'UserController@edit');
Route::get('/user/show/{id}', 'UserController@show');
Route::get('/user/delete/{id}', 'UserController@delete');
Route::post('/user/update', 'UserController@update');


Route::get('/teknisi', 'TeknisiController@index');
Route::get('/teknisi_server_side', 'TeknisiController@teknisi_server_side');
Route::get('/teknisi/tambah', 'TeknisiController@tambah');
Route::post('/teknisi/store', 'TeknisiController@store');
Route::get('/teknisi/edit/{id}', 'TeknisiController@edit');
Route::get('/teknisi/show/{id}', 'TeknisiController@show');
Route::get('/teknisi/delete/{id}', 'TeknisiController@delete');
Route::post('/teknisi/update', 'TeknisiController@update');

Route::get('/admin', 'AdminController@index');
Route::get('/admin_server_side', 'AdminController@admin_server_side');
Route::get('/admin/tambah', 'AdminController@tambah');
Route::post('/admin/store', 'AdminController@store');
Route::get('/admin/edit/{id}', 'AdminController@edit');
Route::get('/admin/show/{id}', 'AdminController@show');
Route::get('/admin/delete/{id}', 'AdminController@delete');
Route::post('/admin/update', 'AdminController@update');

Route::get('/mesin', 'MesinController@index');
Route::get('/mesin_server_side', 'MesinController@mesin_server_side');
Route::get('/mesin/tambah', 'MesinController@tambah');
Route::post('/mesin/store', 'MesinController@store');
Route::get('/mesin/edit/{id}', 'MesinController@edit');
Route::get('/mesin/show/{id}', 'MesinController@show');
Route::get('/mesin/delete/{id}', 'MesinController@delete');
Route::post('/mesin/update', 'MesinController@update');


Route::get('/tahun', 'TahunController@index');
Route::get('/tahun_server_side', 'TahunController@tahun_server_side');
Route::get('/tahun/tambah', 'TahunController@tambah');
Route::post('/tahun/store', 'TahunController@store');
Route::get('/tahun/edit/{id}', 'TahunController@edit');
Route::get('/tahun/show/{id}', 'TahunController@show');
Route::get('/tahun/delete/{id}', 'TahunController@delete');
Route::post('/tahun/update', 'TahunController@update');


Route::get('/periode', 'PeriodeController@index');
Route::get('/periode_server_side', 'PeriodeController@periode_server_side');
Route::get('/periode/tambah', 'PeriodeController@tambah');
Route::post('/periode/store', 'PeriodeController@store');
Route::get('/periode/edit/{id}', 'PeriodeController@edit');
Route::get('/periode/show/{id}', 'PeriodeController@show');
Route::get('/periode/delete/{id}', 'PeriodeController@delete');
Route::post('/periode/update', 'PeriodeController@update');

Route::get('/divisi', 'DivisiController@index');
Route::get('/divisi_server_side', 'DivisiController@divisi_server_side');
Route::get('/divisi/tambah', 'DivisiController@tambah');
Route::post('/divisi/store', 'DivisiController@store');
Route::get('/divisi/edit/{id}', 'DivisiController@edit');
Route::get('/divisi/show/{id}', 'DivisiController@show');
Route::get('/divisi/delete/{id}', 'DivisiController@delete');
Route::post('/divisi/update', 'DivisiController@update');


Route::get('/permintaan/perbaikan', 'RequestPerbaikanController@index');
Route::get('/permintaan/perbaikan/edit/{id}', 'RequestPerbaikanController@edit');
Route::post('/permintaan/perbaikan/ubah', 'RequestPerbaikanController@ubah');
Route::get('/permintaan/perbaikan/delete/{id}', 'RequestPerbaikanController@delete');
Route::post('/permintaan/perbaikan/update', 'RequestPerbaikanController@update');

Route::get('/permintaan/perawatan', 'RequestPerawatanController@index');
Route::get('/permintaan/perawatan/edit/{id}', 'RequestPerawatanController@edit');
Route::post('/permintaan/perawatan/ubah', 'RequestPerawatanController@ubah');
Route::get('/permintaan/perawatan/delete/{id}', 'RequestPerawatanController@delete');
Route::post('/permintaan/perawatan/update', 'RequestPerawatanController@update');

Route::get('/transaksi/perbaikan', 'TransaksiPerbaikanController@index');
Route::get('/transaksi/perbaikan/edit/{id}', 'TransaksiPerbaikanController@edit');
Route::get('/transaksi/perbaikan/delete/{id}', 'TransaksiPerbaikanController@delete');
Route::post('/transaksi/perbaikan/ubah', 'TransaksiPerbaikanController@ubah');

Route::get('/transaksi/perawatan', 'TransaksiPerawatanController@index');
Route::get('/transaksi/perawatan/edit/{id}', 'TransaksiPerawatanController@edit');
Route::get('/transaksi/perawatan/delete/{id}', 'TransaksiPerawatanController@delete');
Route::post('/transaksi/perawatan/ubah', 'TransaksiPerawatanController@ubah');


Route::get('/laporan/perbaikan', 'LaporanPerbaikanController@index');
Route::get('/laporan/perbaikan/print', 'LaporanPerbaikanController@print');

Route::get('/laporan/perawatan', 'LaporanPerawatanController@index');
Route::get('/laporan/perawatan/print', 'LaporanPerawatanController@print');


Route::get('/dashboard/admin', 'DashboardController@admin');


});


Route::get('/dashboard/teknisi', 'DashboardController@teknisi');


Route::get('/kartu/riwayat/mesin', 'KartuController@index');
Route::post('/kartu/riwayat/mesin/print', 'KartuController@print');

Route::get('/dashboard/user', 'DashboardController@user');
Route::get('/dashboard/user', 'DashboardController@user');

Route::get('/user/permintaan/perbaikan', 'PerbaikanController@index');
Route::get('/user/perbaikan/tambah', 'PerbaikanController@tambah');
Route::post('/user/permintaan/perbaikan/store', 'PerbaikanController@store');

Route::get('/user/permintaan/perawatan', 'PerawatanController@index');
Route::get('/user/perawatan/tambah', 'PerawatanController@tambah');
Route::post('/user/permintaan/perawatan/store', 'PerawatanController@store');

Route::group(['middleware' => 'reseller'], function(){

});

Route::get('change-password', 'ChangePasswordController@index');
Route::post('change-password', 'ChangePasswordController@store')->name('change.password');

});


Route::get('/daftar', 'DaftarController@index');
Route::post('/daftar_post', 'DaftarController@store');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
