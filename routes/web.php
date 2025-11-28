<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainDashboardController;
use App\Http\Controllers\CountryDashboardController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FavoritiesController;
use App\Http\Controllers\AboutUsController; 
use App\Http\Controllers\WebInfoController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\RegisterFormController;
use App\Http\Controllers\DoubtsController; 

Route::get('/main-dashboard', [MainDashboardController::class, 'index'])
    ->name('main_dashboard.index');

Route::get('/profile', [ProfileController::class, 'index'])
    ->name('profile.index');

Route::get('/favorites', [FavoritiesController::class, 'index'])
    ->name('favorities.index');

Route::get('/about-us', [AboutUsController::class, 'index'])
    ->name('about_us.index');

Route::get('/web-info', [WebInfoController::class, 'index'])
    ->name('web_info.index');

Route::get('/contact-form', [ContactFormController::class, 'index'])
    ->name('contact_form.index');

Route::post('/contact-form', [ContactFormController::class, 'store'])
    ->name('contact_form.store');

Route::get('/register-form', [RegisterFormController::class, 'index'])
    ->name('register_form.index');

Route::post('/register-form', [RegisterFormController::class, 'store'])
    ->name('register_form.store');

Route::get('/dudas', [DoubtsController::class, 'index'])
    ->name('doubts.index');

Route::get('/country-dashboard/{countryName}', [CountryDashboardController::class, 'show'])
->name('country_dashboard.show');

Route::get('/', function () {
    return view('welcome');
});