<?php
header('Content-type: text/html');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: *');
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BrickController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/brick/all', [BrickController::class, 'all']);

Route::get('/brick/sort/{value}', [BrickController::class, 'sort']);

Route::get('/brick/search/{value}', [BrickController::class, 'search']);

Route::get('/brick/delete/{id}', [BrickController::class, 'delete']);

Route::post('/brick/add', [BrickController::class, 'add']);

Route::get('/cart', function () {
    return view('cart');
});

Route::get('/admin', function () {
    return view('admin');
});