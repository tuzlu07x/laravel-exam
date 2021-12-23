<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\QuestionController;
use GuzzleHttp\Middleware;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
    'middleware' => ['auth','IsAdmin'],'prefix' => 'admin',],function(){
        Route::resource('quizzes', QuizController::class);
        Route::resource('quiz/{quiz_id}/questions', QuestionController::class);
        Route::post('quiz/{quiz_id}/questions/{id}',[QuestionController::class, 'destroy'])->whereNumber('id')->name('questions.destroy');    
});
Route::group(['middleware'=>'auth'], function(){
    Route::get('/front',[FrontController::class, 'index'])->name('front.index');    
    Route::get('/quiz/detay/{slug}',[FrontController::class, 'quiz_detail'])->name('quiz.detail');    
    Route::get('/quiz/{slug}',[FrontController::class, 'quiz_join'])->name('quiz.join');    

});



require __DIR__.'/auth.php';
