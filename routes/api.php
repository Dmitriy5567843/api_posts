<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Posts\PostsController;
use App\Http\Controllers\Users\UsersController;
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

Route::middleware('auth:sanctum')->get('/user', [UsersController::class, 'getMe']);

Route::prefix('admin')
    ->middleware([
        'auth:sanctum',
        'checkIsAdmin',
    ])->group(function () {
        Route::put('/ban/{user}', [UsersController::class, 'ban']);
        Route::put('/unban/{user}', [UsersController::class, 'unban']);
        Route::put('/set-admin/{user}', [UsersController::class, 'setAdmin']);
        Route::put('/del-admin/{user}', [UsersController::class, 'delAdmin']);
    });

// Authentication routes
Route::prefix('auth')->group(function () {
    Route::post('/register', [UsersController::class, 'create']);
    Route::post('/login', [LoginController::class, 'authenticate']);
    Route::post('/logout', [LoginController::class, 'logout'])->middleware('auth:sanctum');
    Route::post('/logout-all', [LoginController::class, 'logoutFromAll'])->middleware('auth:sanctum');
});

Route::group(['prefix' => '/posts', 'middleware' => ['auth:sanctum', 'checkUserBan', 'checkIsAdmin']], function () {
    Route::get('/', [PostsController::class, 'index']);
    Route::get('/{id}', [PostsController::class, 'show']);
    Route::post('/create', [PostsController::class, 'store']);
    Route::put('/update/{id}', [PostsController::class, 'update']);
    Route::delete('/delete/{id}', [PostsController::class, 'delete']);
});

Route::get('/my-posts', [PostsController::class, 'userPosts'])->middleware('auth:sanctum')->middleware('checkUserBan');

