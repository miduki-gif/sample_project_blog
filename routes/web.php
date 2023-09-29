<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//上記の書き方をすることでララベルの組み込みサーバーを動かすコマンドを入力した際に
//ララベルのデフォルトページが表示されていた

//Route::get('/', function () {
// return view('welcome');
//});

//ブログ一覧画面を表示するルーティング定義
//ルーティングには名前を付けることができる
//ルーティングではファイルがある場所のパスを書く必要がある

Route::get('/', 'App\Http\Controllers\BlogController@showList')->name('blogs');

//①ルーティング作成（登録画面表示・ブログ登録）
//②コントローラー作成（登録画面表示）
//③登録画面のBladeを表示（CSRF対策）
//④コントローラー作成（ブログ登録）
//⑤バリデーション作成
//⑤エラー処理

//ブログ登録画面を表示
Route::get('/blog/create', 'App\Http\Controllers\BlogController@showCreate')->name('create');

//ブログ登録
Route::post('/blog/store', 'App\Http\Controllers\BlogController@exeStore')->name('store');

//ブログ詳細画面を表示
Route::get('/blog/{id}', 'App\Http\Controllers\BlogController@showDetail')->name('blogs_show');

//ブログ編集画面を表示
Route::get('/blog/edit/{id}', 'App\Http\Controllers\BlogController@showEdit')->name('edit');
//ブログ編集したものを更新
Route::post('/blog/update', 'App\Http\Controllers\BlogController@exeUpdate')->name('update');
//ブログ削除
Route::post('/blog/delete/{id}', 'App\Http\Controllers\BlogController@exeDelete')->name('delete');



