<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TanaController;
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


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();
Route::view('/login', 'admin/login');
Route::get('admin/login', function () {
    return view('admin.login');
});
Route::post('/admin/login', [App\Http\Controllers\admin\LoginController::class, 'login']);
Route::post('admin/logout', [App\Http\Controllers\admin\LoginController::class, 'logout']);
Route::view('/admin/register', 'admin/register');
Route::post('/admin/register', [App\Http\Controllers\admin\RegisterController::class, 'register']);
Route::view('/admin/home', 'admin/home')->middleware('auth:admin');



Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


// これ消したら$monthsが読み込まれる
// 多分Route::get２つあったから
//２つあると白画面になる

// 後ろにこれ付けないと認証保持してくれない->middleware('auth:admin');
Route::get('admin/fail_register.php', [TanaController::class, 'fail_page'])->middleware('auth:admin');
Route::get('admin/fail_register.php', [TanaController::class, 'index'])->middleware('auth:admin');

Route::post('admin/fail_register.php', [TanaController::class, 'postParam'])->middleware('auth:admin');
Route::post('admin/fail_register.php', [TanaController::class, 'fail_create'])->middleware('auth:admin');

Route::get('admin/top_select.php', [TanaController::class, 'top_page'])->name('top')->middleware('auth:admin');
//  Route::post('top_select.php', [TanaController::class, 'list_edit']);

Route::get('admin/list.php', [TanaController::class, 'list_page'])->middleware('auth:admin');

Route::post('admin/list.php', [TanaController::class, 'postParam'])->middleware('auth:admin');

Route::get('admin/list_regi.php', [TanaController::class, 'list_regi_page'])->middleware('auth:admin');
Route::post('admin/list_regi.php', [TanaController::class, 'list_create'])->middleware('auth:admin');


Route::get('admin/edit_conf.php',[TanaController::class, 'edit_page'])->middleware('auth:admin');
Route::post('admin/edit_conf.php',[TanaController::class, 'edit_conf'])->middleware('auth:admin');


// Route::get('admin/edit.php', [TanaController::class, 'edit'])->middleware('auth:admin');
Route::get('admin/edit.php', [TanaController::class, 'postParam'])->middleware('auth:admin');

Route::post('admin/complete.php', [TanaController::class, 'edit_cleate'])->middleware('auth:admin');

Route::get('admin/delete_complete.php',[TanaController::class, 'delete_page'])->middleware('auth:admin');

Route::get('count_fail.php',[TanaController::class, 'count_top_page'])->middleware('auth');
 Route::get('count.php',[TanaController::class, 'count'])->middleware('auth');
 Route::get('count_edit.php',[TanaController::class, 'count_edit'])->middleware('auth');

 Route::post('count_edit.php',[TanaController::class, 'countall'])->middleware('auth');

//  .phpでpostの値を受け取ったときにcount_allを発動する
//Route::post('count_all.php',[TanaController::class, 'count_all']);

Route::post('amont.php',[TanaController::class, 'ajax'])->name('splite_blade.ajax')->middleware('auth');
Route::post('count_all.php',[TanaController::class, 'count_all'])->middleware('auth');


// パスワードリセット
Route::view('/admin/password/reset', 'admin/passwords/email');
Route::post('/admin/password/email', [App\Http\Controllers\admin\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::view('/admin/password/reset/{token}', [App\Http\Controllers\admin\ResetPasswordController::class,'showResetForm']);
Route::post('/admin/password/reset', [App\Http\Controllers\admin\ResetPasswordController::class, 'reset']);





Route::group(['middleware' => 'auth'], function() {
    
 });