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

Route::prefix('/tasks')->middleware('auth')->controller(TaskController::class)->group(function (){
    //Toutes les taches
    Route::get('/', 'index')->name('all_tasks');

    //Toutes les taches
    //Route::get('/', 'all')->name('all_tasks');
    
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
    Route::delete('delete/task/{task}' , 'destroy')->name('task.delete');

    //Taches terminées
    Route::get('/done' , 'done')->name('tasks.done') ;
    

}) ;


require __DIR__.'/auth.php';
