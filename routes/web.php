<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Recruiter\VacancyController;
use App\Http\Controllers\Notifications\NotificationController;
use App\Http\Controllers\Candidate\CandidateController;
use App\Http\Controllers\Home\HomeController;


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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [ VacancyController::class, 'index' ] )
        ->middleware( ['auth', 'verified', 'rol.recruiter'] )
        ->name('vacancies.index');
        
Route::get('/vacancies/create', [ VacancyController::class, 'create' ] )
        ->middleware(['auth', 'verified'])
        ->name('vacancies.create');

Route::get('/vacancies/{vacancy}/edit', [ VacancyController::class, 'edit' ] )
        ->middleware(['auth', 'verified'])
        ->name('vacancies.edit');

Route::get('/vacancies/{vacancy}/show', [ VacancyController::class, 'show' ] )
        ->name('vacancies.show');

Route::get('/candidates/{vacancy}', [ CandidateController::class, 'index' ] )
        ->name('candidates.index');

// Notificaciones
Route::get('/notifications', NotificationController::class)
        ->middleware(['auth', 'verified', 'rol.recruiter'])
        ->name('notifications');


require __DIR__.'/auth.php';
