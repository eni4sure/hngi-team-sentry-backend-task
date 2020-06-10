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
Route::post('/add_page', 'AddPageController');

Route::get('/retrieve_page', 'RetrievePageHtmlController');

Route::get('/set_page_markdown', 'SetPageMarkdownController');

Route::get('/list_pages', 'ListPagesController');
