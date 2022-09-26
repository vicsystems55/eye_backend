<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiAuthController;
use App\Http\Controllers\ModuleController;
use App\Http\Controllers\CountrySelectorController;

use App\Http\Controllers\UserProfileController;

use App\Http\Controllers\NotificationController;

use App\Http\Controllers\QuizzController;

use App\Http\Controllers\WorksheetController;

use App\Http\Controllers\QuizzAnswerController;

use App\Http\Controllers\DBController;

use App\Http\Controllers\PDFController;






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
// auth
Route::post('/register', [ApiAuthController::class, 'register']);

Route::post('/login', [ApiAuthController::class, 'login']);

// module 

Route::post('/modules', [ModuleController::class, 'create_module']);

Route::get('/modules', [ModuleController::class, 'modules']);

Route::post('/update_module', [ModuleController::class, 'update_module']);

Route::post('/create_quiz', [QuizzController::class, 'create_quiz']);

Route::get('/quizes', [QuizzController::class, 'get_quizes'])->middleware('checkdb');

Route::post('/worksheets', [WorksheetController::class, 'create_worksheet']);

Route::get('/worksheets', [WorksheetController::class, 'get_worksheets']);

Route::get('/users', [UserProfileController::class, 'users'])->middleware('auth:sanctum');

Route::post('/users', [UserProfileController::class, 'update_profile'])->middleware('auth:sanctum');

Route::get('/countries', [CountrySelectorController::class, 'countries']);

Route::get('/notifications', [NotificationController::class, 'notifications'])->middleware('auth:sanctum');

Route::post('/submit_answer', [QuizzAnswerController::class, 'submitAnswer']);

Route::get('/switch_db', [DBController::class, 'switch_db']);


Route::get('/generate_cert', [PDFController::class, 'generate_cert']);






// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });



