<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\CheckListItemController;
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

Route::group(['middleware' => 'api', 'prefix' =>'v1'], function(){
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);

    Route::apiResource('/checklist',CheckListController::class);

    Route::apiResource('/checklist/{checklistid}/item',CheckListItemController::class);
});
