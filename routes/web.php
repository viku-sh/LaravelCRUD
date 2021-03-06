<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\verify;
use App\Http\Controllers\signup;
use App\Http\Controllers\taskController;
use App\Http\Controllers\listController;
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
//     if(session()->has('user')) return redirect('tasks');
//     return view('signup');
// });

// Route::get('/login',function(){
//     if(session()->has('user')) return redirect('tasks');
//     return view('login');
// });

// Route::post('login',[verify::class,'log']);

// Route::get('/register',function(){
//     if(session()->has('user')) return redirect('tasks');
//     return view('signup');
// });

// Route::post('signup',[signup::class,'sign']);

// Route::get('signup',function(){
//     if(session()->has('user')) return redirect('tasks');
//     return view('signup');
// });

Route::view('/tasks','tasks')->middleware('task');
Route::view('/app','api.api')->name('app');

// Route::get('/tasks',function(){
//     if(session()->missing('user')) return redirect('login');
//     return view('tasks'); 
// });

Route::get('/logout',function(){
    //if(session()->has('user')) session()->pull('user',NULL);
    Auth::logout();
    return redirect('login');
});

Route::post('/tasks',[taskController::class,'add']);

Route::get('/list',[listController::class,'show']);

Route::post('/list',[listController::class,'update']);


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

