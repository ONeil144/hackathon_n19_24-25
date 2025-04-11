<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WorkflowController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DossierMedicalController;
use App\Http\Controllers\TraitementController;
use App\Http\Controllers\ExamenController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/personnel/dashboard', [HomeController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard_personnel');

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::delete('/users/{user}', [DashboardController::class, 'destroy'])->name('users.destroy');
    Route::resource('workflows', WorkflowController::class);
    Route::resource('dossiers_medicaux', DossierMedicalController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('traitements', TraitementController::class);
    // route pour la modification des informations par un administrateur dans le dashbordAdmin
    Route::put('/dashboard/update-user/{id}', [DashboardController::class, 'updateUser'])->name('dashboard.updateUser');
        // route pour supprimer un utilisateur    par un administrateur dans le dashbordAdmin
    Route::delete('/dashboard/delete/{id}', [DashboardController::class, 'deleteUser'])->name('dashboard.deleteUser');

    // route concernant les examens 

Route::get('/examens/create', [ExamenController::class, 'create'])->name('examens.create');
Route::post('/examens', [ExamenController::class, 'store'])->name('examens.store');
Route::get('/examens', [ExamenController::class, 'index'])->name('examens.index');
// Afficher le formulaire de modification
Route::get('examens/{id}/edit', [ExamenController::class, 'edit'])->name('examens.edit');

// Mettre à jour l'examen
Route::put('examens/{id}', [ExamenController::class, 'update'])->name('examens.update');

// Supprimer un examen
Route::delete('examens/{id}', [ExamenController::class, 'destroy'])->name('examens.destroy');


});


require __DIR__.'/auth.php';