<?php

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
/*
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
*/
Route::group(['middleware'=>'auth'],function(){

Route::get('/dashboard',[App\Http\Controllers\MainController::class, 'dashboard'])->name('dashboard');
Route::get('/quiz/detay/{id}/{slug}',[App\Http\Controllers\MainController::class, 'quiz_detail'])->name('quiz.detail');
Route::get('/answer/quiz/detay/{id}/{slug}',[App\Http\Controllers\MainController::class, 'answer_quiz_detail'])->name('answer.quiz.detail');
Route::post('/quiz',[App\Http\Controllers\MainController::class, 'quiz'])->name('quiz.join');
Route::get('/quiz/answer/{id}/{slug}',[App\Http\Controllers\MainController::class, 'quiz_answer'])->name('quiz.answer');
Route::post('/quiz/{id}/{slug}/result',[App\Http\Controllers\MainController::class, 'result'])->name('quiz.result');

});
Route::group(['namespace'=>'admin','prefix'=>'admin','as'=>'admin.','middleware'=>['auth','isAdmin']],function(){

    Route::get('/', [App\Http\Controllers\admin\indexController::class,'index']);

    Route::group(['namespace'=>'ustimtahanlar','prefix'=>'ustimtahanlar','as'=>'ustimtahanlar.'],function (){
        Route::get('/',[App\Http\Controllers\admin\kategori\ustimtahanlar\indexController::class, 'index'])->name('index');
        Route::get('/ekle',[App\Http\Controllers\admin\kategori\ustimtahanlar\indexController::class, 'create'])->name('create');
        Route::post('/ekle',[App\Http\Controllers\admin\kategori\ustimtahanlar\indexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}',[App\Http\Controllers\admin\kategori\ustimtahanlar\indexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}',[App\Http\Controllers\admin\kategori\ustimtahanlar\indexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}',[App\Http\Controllers\admin\kategori\ustimtahanlar\indexController::class, 'delete'])->name('delete');
    });
    


    Route::group(['namespace'=>'altimtahanlar','prefix'=>'altimtahanlar','as'=>'altimtahanlar.'],function (){
        Route::get('/',[App\Http\Controllers\admin\kategori\altimtahanlar\indexController::class, 'index'])->name('index');
        Route::get('/ekle',[App\Http\Controllers\admin\kategori\altimtahanlar\indexController::class, 'create'])->name('create');
        Route::post('/ekle',[App\Http\Controllers\admin\kategori\altimtahanlar\indexController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}',[App\Http\Controllers\admin\kategori\altimtahanlar\indexController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}',[App\Http\Controllers\admin\kategori\altimtahanlar\indexController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}',[App\Http\Controllers\admin\kategori\altimtahanlar\indexController::class, 'delete'])->name('delete');
    });

    Route::group(['namespace'=>'admin','prefix'=>'quiz','as'=>'quiz.'],function (){
        Route::get('/',[App\Http\Controllers\admin\QuizController::class, 'index'])->name('index');
        Route::get('/ekle',[App\Http\Controllers\admin\QuizController::class, 'create'])->name('create');
        Route::post('/ekle',[App\Http\Controllers\admin\QuizController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{id}',[App\Http\Controllers\admin\QuizController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}',[App\Http\Controllers\admin\QuizController::class, 'update'])->name('edit.post');
        Route::get('/sil/{id}',[App\Http\Controllers\admin\QuizController::class, 'delete'])->name('delete');
        Route::get('/quizzes/{id}/details',[App\Http\Controllers\admin\QuizController::class, 'show'])->name('details');

        Route::group(['namespace'=>'admin','prefix'=>'sual','as'=>'sual.'],function (){
        Route::get('/{id}',[App\Http\Controllers\admin\QuestionController::class, 'index'])->name('index');
        Route::get('/ekle/{id}',[App\Http\Controllers\admin\QuestionController::class, 'create'])->name('create');
        Route::post('/ekle',[App\Http\Controllers\admin\QuestionController::class, 'store'])->name('create.post');
        Route::get('/duzenle/{quiz_id}/{id}',[App\Http\Controllers\admin\QuestionController::class, 'edit'])->name('edit');
        Route::post('/duzenle/{id}',[App\Http\Controllers\admin\QuestionController::class, 'update'])->name('edit.post');
        Route::get('/sil/{quiz_id}/{id}',[App\Http\Controllers\admin\QuestionController::class, 'delete'])->name('delete');

    });






    });






});