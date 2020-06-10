<?php

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
Route::post('/add_page', 'AddFileController');

Route::get('/retrieve_page', 'RetrievePageController');

Route::get('/set_page_markdown', 'SetMarkdownController');

Route::get('/list_pages', 'ListPagesController');
