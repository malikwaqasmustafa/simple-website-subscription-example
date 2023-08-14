<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\PostController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::get('websites', WebsiteController::class);
Route::post('websites/subscribe', [SubscriptionController::class, 'save']);

Route::get('websites/{website}/posts', [PostController::class, 'posts']);
Route::post('websites/save-post', [PostController::class, 'storePost']);
