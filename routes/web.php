<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VaccineRegistrationController;


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

Route::get('/', [VaccineRegistrationController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [VaccineRegistrationController::class, 'register'])->name('register.submit');
Route::get('/schedule-vaccinations/{id}', [VaccineRegistrationController::class, 'scheduleVaccinations'])->name('schedule.vaccinations');
Route::get('/mark-as-vaccinated/{id}', [VaccineRegistrationController::class, 'markAsVaccinated'])->name('mark.vaccinated');
