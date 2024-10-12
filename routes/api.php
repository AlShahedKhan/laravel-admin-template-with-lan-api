<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Backend\LanguageManagementController;

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

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
// Route::get('/user', [AuthController::class, 'user']);
Route::middleware('auth:sanctum')->group( function () {
    Route::get('/user', [AuthController::class, 'user']);
});

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// GET /api/languages

// POST /api/languages/store
// Body: 
// {
//     "name": "Spanish",
//     "code": "es",
//     "icon_class": "fa-flag",
//     "direction": "ltr"
// }

// GET /api/languages/edit/1

// PUT /api/languages/update/1
// Body: 
// {
//     "name": "Spanish Updated",
//     "code": "es",
//     "icon_class": "fa-flag",
//     "direction": "ltr"
// }

// DELETE /api/languages/delete/1

// POST /api/languages/change-language
// Body:
// {
//     "code": "es"
// }

// Route::prefix('languages')->group(function () {
//     Route::get('/', [LanguageManagementController::class, 'index']);
//     Route::post('/store', [LanguageManagementController::class, 'store']);
//     Route::get('/edit/{id}', [LanguageManagementController::class, 'edit']);
//     Route::put('/update/{id}', [LanguageManagementController::class, 'update']);
//     Route::delete('/delete/{id}', [LanguageManagementController::class, 'delete']);
//     Route::get('/terms/{id}', [LanguageManagementController::class, 'terms']);
//     Route::put('/update/terms/{code}', [LanguageManagementController::class, 'termsUpdate']);
//     Route::get('/change-module', [LanguageManagementController::class, 'changeModule']);
//     Route::post('/change-language', [LanguageManagementController::class, 'changeLanguage']);
// });

Route::get('/languages', [LanguageManagementController::class, 'getAllLanguages']);
Route::get('/languages/json/{code}/{file}', [LanguageManagementController::class, 'getJson']);
// GET http://localhost:8000/api/languages/json/en/cricket *** working

Route::post('/languages/change', [LanguageManagementController::class, 'changeLanguage']);

