<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;


//Student List
Route::get('/students', [StudentController::class, 'index']);

//Create a student
Route::get('/students/create', [StudentController::class, 'create']);
Route::post('/students', [StudentController::class, 'store']);

//index.blade.php swiching page
Route::get('/students/create', [StudentController::class, 'create'])->name('students.create');

//edit.blade.php
Route::get('/students/{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
Route::put('/students/{student}', [StudentController::class, 'update'])->name('students.update');

Route::resource('students', StudentController::class);