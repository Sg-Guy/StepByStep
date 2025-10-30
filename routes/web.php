<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [ProfileController::class , 'dash'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::get('/', function () {
    return view('welcome');
});

Route::prefix('/tasks')->controller(TaskController::class)->group(function (){
    //Route qui  affiche le dashbord
    Route::get('/', 'index')->name('index');

    //Toutes les taches
    Route::get('/all', 'all')->name('all_tasks')->middleware('auth');
    
    //formulaire de creation de taches
    Route::get('/register/form', 'create')->name('create');

    //Stockage des taches
    Route::post('store' , 'store')->name('store');

    //formulaire d'édition des taches
    Route::get('/edite/form/{task}', 'edit')->name('edite');

    //Mise à jours après soummission du formulaire de modification
    Route::put('edite/{task}' , 'update')->name('update') ;

    //Status de la tache
    Route::patch('patch/{task}' , 'patch')->name('task.status');
    
    //Suppression de tâches
    Route::delete('delete/{task}' , 'destroy')->name('delete');
    

}) ;


require __DIR__.'/auth.php';
