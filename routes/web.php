<?php

use App\Models\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\RevisorController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
//************* PUBLIC
Route::get('/', [PublicController::class, 'homepage'])->name('homepage');
/* Rotta tutti gli annunci */
Route::get('/articles/index', [ArticleController::class,'articlesIndex'])->name('articles.index');

/* Rotta per show category */
Route::get('/categories/{category}', [PublicController::class, 'categoryShow'])->name('category.show');

//Articoli livewire
Route::get('/articles/create', [ArticleController::class, 'create'])->name('articles.create');

/* Rotta dettaglio annunci */
Route::get('/articles/show/{article}', [ArticleController::class, 'show'])->name('articles.show');

//********** REVISORE

//Home revisore
Route::get('/revisor/home',[RevisorController::class,'index'])->middleware('isRevisor')->name('revisor.index');
/* rotta accetta articolo eliminato */
Route::patch('/accept/article-deleted/{article}', [RevisorController::class, 'acceptArticleDeleted'])->middleware('isRevisor')->name('revisor.accept_article_deleted');
/* rotta elimina articolo confermato */
Route::patch('/reject/article-confirmed/{article}', [RevisorController::class, 'rejectArticleConfirmed'])->middleware('isRevisor')->name('revisor.reject_article_confirmed');
//tabelle revisore
Route::get ('/articles/confirmed', [RevisorController::class, 'confirmedShow'])->middleware('auth','isRevisor')->name('revisor.confirmed');
Route::get ('/articles/deleted', [RevisorController::class, 'deletedShow'])->middleware('auth','isRevisor')->name('revisor.deleted');
Route::get ('/articles/in-revision', [RevisorController::class, 'inRevisionShow'])->middleware('auth','isRevisor')->name('revisor.inRevision');
//articolo singolo per revisore
Route::get ('/article/revisor/show/{article}', [RevisorController::class , 'show'])->middleware('auth','isRevisor')->name('revisor.show');

/* Rotta Accetta */
Route::patch('/accept/article/{article}', [RevisorController::class, 'acceptArticle'])->middleware('isRevisor')->name('revisor.accept_article');
/* Rotta Rifiuta */
Route::patch('/reject/article/{article}', [RevisorController::class, 'rejectArticle'])->middleware('isRevisor')->name('revisor.reject_article');
/* pulsante per annullare */
Route::patch('/undo/article', [RevisorController::class, 'undoArticle'])->name('revisor.undo_article')->middleware('isRevisor');
/* About Us */
Route::get('/about-us', [PublicController::class,'aboutUs'])->name('aboutUs');

// ****** LAVORA CON NOI
//form workwithus
Route::get('/work-with-us',[RevisorController::class, 'completeForm'])->middleware('auth')->name('complete.form');

//Richiedi di diventare revisore
Route::post('/request/revisor', [RevisorController::class, 'becomeRevisor'])->name('become.revisor');

//Rendi utente revisore
Route::get('/make/revisor/{user}',[RevisorController::class, 'makeRevisor'])->name('make.revisor')->middleware('auth');

//Ricerca Annuncio
Route::get('/search/articles', [PublicController::class, 'searchArticles'])->name('articles.search');

/* Rotta area utente */
Route::get('/auth/profile', [PublicController::class,'authProfile'])->middleware('auth')->name('auth.profile');

// *****LINGUE
//Rotta lingue
Route::post('/language/change/{lang}', [PublicController::class,'language'])->name('setLocale');

