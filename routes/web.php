<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EducationController;
use App\Http\Controllers\ExperienceController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\SkillController;
use Illuminate\Support\Facades\Auth;
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

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    //experience
    Route::get('/experience', [ExperienceController::class, 'index'])->name('experience.index');
    Route::get('/experience-create', [ExperienceController::class, 'create']);
    Route::post('/save_experiences', [ExperienceController::class, 'store']);
    Route::get('/experience/{id}', [ExperienceController::class, 'edit']);
    Route::put('/experience/{id}', [ExperienceController::class, 'update'])->name('experience.update');
    Route::get('/experience-delete/{id}', [ExperienceController::class, 'destroy'])->name('experience');

    //skill
    Route::get('/skills', [SkillController::class, 'index'])->name('skills.index');
    Route::get('/skills-create', [SkillController::class, 'create']);
    Route::post('/save_skills', [SkillController::class, 'store']);
    Route::get('/skills/{id}', [SkillController::class, 'edit']);
    Route::put('/skills/{id}', [SkillController::class, 'update'])->name('skills.update');
    Route::get('/skills-delete/{id}', [SkillController::class, 'destroy'])->name('skills');

    //Education
    Route::get('/education', [EducationController::class, 'index'])->name('education.index');
    Route::get('/education-create', [EducationController::class, 'create']);
    Route::post('/save_education', [EducationController::class, 'store']);
    Route::get('/education/{id}', [EducationController::class, 'edit']);
    Route::put('/education/{id}', [EducationController::class, 'update'])->name('education.update');
    Route::get('/education-delete/{id}', [EducationController::class, 'destroy'])->name('education');
    
    //category
    Route::get('/category', [CategoryController::class, 'index'])->name('category.index');
    Route::get('/category-create', [CategoryController::class, 'create']);
    Route::post('/save_category', [CategoryController::class, 'store']);
    Route::get('/category/{id}', [CategoryController::class, 'edit']);
    Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category-delete/{id}', [CategoryController::class, 'destroy'])->name('category');

    //portfolio
    Route::get('/portfolio', [PortfolioController::class, 'index'])->name('portfolio.index');
    Route::get('/portfolio-create', [PortfolioController::class, 'create']);
    Route::post('/save_portfolio', [PortfolioController::class, 'store']);
    Route::get('/portfolio/{id}', [PortfolioController::class, 'edit']);
    Route::put('/portfolio/{id}', [PortfolioController::class, 'update'])->name('portfolio.update');
    Route::get('/portfolio-delete/{id}', [PortfolioController::class, 'destroy'])->name('portfolio');
});
