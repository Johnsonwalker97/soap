<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SoapServiceController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/index', function () {
    return view('index');
});

//Route::post('/soap', 'SoapServiceController@index');
//Route::match(['post'], [SoapServiceController::class, 'index']);
//Route::get('/soap', [SoapServiceController::class, 'index']);

//Route::match(['get', 'post', 'head'], '/soap', [SoapServiceController::class, 'index']);


//Route::post('/soap', 'SoapServiceController@index');
Route::get('/insert', [SoapServiceController::class, 'insert']);



Route::get('/fetch-data', [SoapServiceController::class, 'fetchData']);

Route::get('/form', [SoapServiceController::class, 'allproducts']);

/*Route::get('/form', [SoapServiceController::class, 'Delete']);*/

Route::post('/Delete', [SoapServiceController::class, 'delete']);

Route::post('/Insertform', [SoapServiceController::class, 'Insertform']);

Route::post('/update', [SoapServiceController::class, 'update']);


