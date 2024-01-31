<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CopyController;
use App\Http\Controllers\LendingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
// apiresource frontendhez
Route::apiResource('/users', UserController::class);
Route::apiResource('/copies', CopyController::class);
Route::apiResource('/books', BookController::class);
Route::get('/lendings', [LendingController::class, 'index']);
Route::get('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'show']);
Route::post('/lendings', [LendingController::class, 'store']);
Route::put('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'update']);
Route::delete('/lendings/{user_id}/{copy_id}/{start}', [LendingController::class, 'destroy']);
Route::patch('/users_update_password/{id}', [UserController::class, 'updatePassword']);

Route::middleware("auth.basic")->group(function () {
    Route::apiResource("/users", UserController::class);
    Route::get('/lending_by_user', [UserController::class, 'lendingByUser']);
    Route::get('/all_lending', [LendingController::class, 'allLendingUserCopy']);
    Route::get('/all_copies_books_lendings', [CopyController::class, 'allCopiesWithBooksAndLendings']);
    Route::get('/whatLendingsOnDate/{myDate}', [LendingController::class, 'whatLendingsOnDate']);
    Route::get('/allLendingsWith/{thisCopy}', [CopyController::class, 'allLendingsWith']);
    Route::get('howManyLendingsIHave', [UserController::class, 'howManyLendingsIHave']);
    // db lekérdezések
    Route::get('title_count', [BookController::class, 'titleCount']);
    Route::get('softOrHard/{kotes}', [CopyController::class, 'hAuthorTitle']);
    Route::get('whereYear/{year}', [CopyController::class, 'year']);
});
