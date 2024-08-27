<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Pelatihan\ModulController;
use App\Http\Controllers\Pelatihan\TopicController;
use App\Http\Controllers\Pelatihan\UserpageController;
use App\Http\Controllers\Pelatihan\QuestionController;
use App\Http\Controllers\Superadmin\RoleController;
use App\Http\Controllers\DSSController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\Auth\LoginController;
use App\Models\Role;

Route::get('/reset', [UserpageController::class, 'restartSession'])->name('reset');
Route::prefix('pelatihan')->group(function () {
    Route::get('/{id}', [UserpageController::class, 'index'])->name('pelatihan.index');
    Route::get('/detail/{id}', [UserpageController::class, 'detail'])->name('pelatihan.detail');
    Route::get('/latihan/{id}', [UserpageController::class, 'soal'])->name('pelatihan.soal');
    Route::post('/jawaban', [PenilaianController::class, 'store'])->name('answer.post');
    Route::get('/latihan', function () {
        return view('user.pages.pelatihan.latihan');
    })->name('latihan');
});

Route::prefix('admin')->group(function () {

    Route::prefix('pelatihan')->group(function () {
        Route::get('/modul/{id}', [ModulController::class, 'index'])->name('pelatihan.modul.index');
        Route::get('/create', [ModulController::class, 'create'])->name('pelatihan.modul.create');
        Route::post('/store/modul', [ModulController::class, 'store'])->name('pelatihan.modul.store');
        Route::get('/edit/{id}', [ModulController::class, 'edit'])->name('pelatihan.modul.edit');
        Route::put('/update/{modul}', [ModulController::class, 'update'])->name('pelatihan.modul.update');
        Route::delete('/delete/modul/{modul}', [ModulController::class, 'destroy'])->name('pelatihan.modul.delete');
        Route::post('/store', [TopicController::class, 'store'])->name('pelatihan.topic.store');
        Route::put('/{topic}', [TopicController::class, 'update'])->name('pelatihan.topic.update');
        Route::delete('/delete/{topic}', [TopicController::class, 'destroy'])->name('pelatihan.topic.delete');

        Route::prefix('questions')->group(function () {
            Route::get('/', [QuestionController::class, 'index'])->name('questions.index');
            Route::get('/create-opt',  [QuestionController::class, 'createOpt'])->name('questions.createOpt');
            Route::get('/create-essay', [QuestionController::class, 'createEssay'])->name('questions.createEssay');
            Route::post('/store-opt', [QuestionController::class, 'storeOpt'])->name('questions.storeOpt');
            Route::post('/store-essay', [QuestionController::class, 'storeEssay'])->name('questions.storeEssay');
            Route::get('/edit-opt/{questionOpt}', [QuestionController::class, 'editOpt'])->name('questions.editOpt');
            Route::get('/edit-essay/{questionEssay}', [QuestionController::class, 'editEssay'])->name('questions.editEssay');
            Route::put('/update-opt/{questionOpt}', [QuestionController::class, 'updateOpt'])->name('questions.updateOpt');
            Route::put('/update-essay/{questionEssay}', [QuestionController::class, 'updateEssay'])->name('questions.updateEssay');
            Route::delete('/destroy-opt/{questionOpt}', [QuestionController::class, 'destroyOpt'])->name('questions.destroyOpt');
            Route::delete('/destroy-essay/{questionEssay}', [QuestionController::class, 'destroyEssay'])->name('questions.destroyEssay');
        });
    });
    Route::prefix('superadmin')->group(function () {
        Route::get('/role/{id}', [RoleController::class, 'index'])->name('superadmin.role.index');
    });
    Route::prefix('pendukung-keputusan')->group( function () {
        Route::get('/', [DSSController::class, 'index'])->name('pendukung-keputusan.index');
        Route::get('/hasil', function () {
            return view('admin.pages.result');
        })->name('result');
    });

    Route::get('/modul', function () {
        return view('admin.pages.pelatihan.modul');
    })->name('modul');
    Route::get('/manage-modul', function () {
        return view('admin.pages.pelatihan.manage_modul');
    })->name('manageModul');

    Route::resource('questionsOpt', QuestionOptController::class);
    Route::resource('questionsEssay', QuestionEssayController::class);
});

Route::get('/feedback', [FeedbackController::class, 'index'])->name('feedback');
Route::post('/feedback/post', [FeedbackController::class, 'post'])->name('feedback.post');
Route::post('/feedback/reply', [FeedbackController::class, 'reply'])->name('feedback.reply');
Route::post('/feedback/like', [FeedbackController::class, 'like'])->name('feedback.like');
Route::post('/feedback/share', [FeedbackController::class, 'share'])->name('feedback.share');

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');