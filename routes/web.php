<?php

use App\Http\Controllers\InterviewQuestionController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('interview-questions', [InterviewQuestionController::class, 'index']);
Route::get('add-interview-questions', [InterviewQuestionController::class, 'create']);
Route::post('save-interview-questions', [InterviewQuestionController::class, 'store']);
Route::get('interview-question', [InterviewQuestionController::class, 'detail']);

Route::get('email-test', function() {

    $details['email'] = 'asodiyavishwas1@gmail.com';

    dispatch(new App\Jobs\SendEmailJob($details));

    dd('done');
});
