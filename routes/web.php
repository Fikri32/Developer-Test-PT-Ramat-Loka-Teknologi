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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'penulis'],function(){
  Route::get('','PenulisController@index')->name('penulis.index');
  Route::match(['get','post'],'tambah','PenulisController@store')->name('penulis.tambah');
  Route::match(['get','put'],'update/{id}','PenulisController@update')->name('penulis.update');

  Route::get('delete/{id}','PenulisController@destroy')->name('penulis.delete');
});

Route::group(['prefix' => 'penerbit'],function(){
  Route::get('','PenerbitController@index')->name('penerbit.index');
  Route::match(['get','post'],'tambah','PenerbitController@store')->name('penerbit.tambah');
  Route::match(['get','put'],'update/{id}','PenerbitController@update')->name('penerbit.update');

  Route::get('delete/{id}','PenerbitController@destroy')->name('penerbit.delete');
});

Route::group(['prefix' => 'kategori'],function(){
  Route::get('','KategoriController@index')->name('kategori.index');
  Route::match(['get','post'],'tambah','KategoriController@store')->name('kategori.tambah');
  Route::match(['get','put'],'update/{id}','KategoriController@update')->name('kategori.update');

  Route::get('delete/{id}','KategoriController@destroy')->name('kategori.delete');
});

Route::group(['prefix' => 'buku'],function(){
  Route::get('','BukuController@index')->name('buku.index');
  Route::get('cari','BukuController@cari')->name('buku.cari');
  Route::match(['get','post'],'tambah','BukuController@store')->name('buku.tambah');
  Route::match(['get','put'],'update/{id}','BukuController@update')->name('buku.update');
  Route::get('delete/{id}','BukuController@destroy')->name('buku.delete');
});

Route::group(['prefix' => 'pinjam'],function(){
  Route::get('','PeminjamanController@index')->name('pinjam.index');
  // Route::get('cari','PeminjamanController@cari')->name('pinjam.cari');
  Route::match(['get','post'],'tambah','PeminjamanController@store')->name('pinjam.tambah');
  Route::match(['get','put'],'update/{id}','PeminjamanController@update')->name('pinjam.update');
  Route::get('delete/{id}','PeminjamanController@destroy')->name('pinjam.delete');
});