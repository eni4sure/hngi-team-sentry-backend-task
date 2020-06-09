<?php

use App\Http\Controllers\AddFile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
Route::post('/add_page', 'AddPage');

Route::get('/retrieve_page', 'RetrievePage');

Route::get('/list_pages', 'ListPages');
