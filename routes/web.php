<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\HomeController;


// Définition de la route accueil
Route::get('/', [HomeController::class, 'index'])->name('accueil');

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/add_traitement', function () {
    return view('traitements.add_traitement');
})->name('traitement.ajout');

Route::get('/examen/create', function () {
    return view('examen.add_examen');
})->name('examen.ajout');

Route::get('/patients/create', [PatientController::class, 'create'])->name('patients.create');
Route::get('/patients', function () {
    return view('patients.liste_patient');
})->name('patients.liste');

Route::get('/consultation', function () {
    return view('consultations.consultation');
})->name('consultation.liste');

Route::get('/consultations', [ConsultationController::class, 'index'])->name('consultations.index');
Route::get('/notifications/create', [NotificationController::class, 'create'])->name('notifications.create');
