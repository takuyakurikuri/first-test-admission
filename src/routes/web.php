<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Models\Contact;
use App\Http\Controllers\AuthController;
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

Route::get('/', [ContactController::class, 'index']);

Route::post('/confirm',[ContactController::class,'confirm']);

Route::post('/contacts',[ContactController::class,'store']);

Route::post('/login', [AuthController::class, 'login']);

Route::post('register',[AuthController::class,'store']);

Route::middleware('auth')->group(function(){
    route::get('/admin',[AuthController::class, 'admin']);
});

Route::get('/thanks',[ContactController::class,'thanks']);

Route::get('/admin/search', [ContactController::class, 'search']);

Route::delete('/admin/delete',[ContactController::class,'destroy']);

Route::get('/admin/csv',[ContactController::class,'exportCsv']);