<?php

use Illuminate\Support\Facades\Route;

// Route::view('/', 'welcome');
Route::middleware('auth')->group(function () {
    Route::get('/', App\Livewire\Pages\Home::class)->name('index');

    Route::get('/class', App\Livewire\Pages\Class\Index::class)->name('class.index');
    Route::get('/class/create', App\Livewire\Pages\Class\Create::class)->name('class.create');
    Route::get('/class/edit/{class}', App\Livewire\Pages\Class\Edit::class)->name('class.edit');
    Route::get('/class/detail/{class}', App\Livewire\Pages\Class\Filter::class)->name('class.detail');

    Route::get('/students', App\Livewire\Pages\Student\Index::class)->name('student.index');
    Route::get('/students/create', App\Livewire\Pages\Student\Create::class)->name('student.create');
    Route::get('/students/edit/{student}', App\Livewire\Pages\Student\Edit::class)->name('student.edit');
    Route::get('/students/detail/{student}', App\Livewire\Pages\Student\Detail::class)->name('student.detail');

    Route::get('/teachers', App\Livewire\Pages\Teacher\Index::class)->name('teacher.index');
    Route::get('/teachers/create', App\Livewire\Pages\Teacher\Create::class)->name('teacher.create');
    Route::get('/teachers/edit/{teacher}', App\Livewire\Pages\Teacher\Edit::class)->name('teacher.edit');
    Route::get('/teachers/detail/{teacher}', App\Livewire\Pages\Teacher\Detail::class)->name('teacher.detail');

    Route::get('/student_class', App\Livewire\Pages\StudentClass::class)->name('student_class.index');
    Route::get('/teacher_class', App\Livewire\Pages\TeacherClass::class)->name('teacher_class.index');
    Route::get('/class_list', App\Livewire\Pages\ClassStudentTeacher::class)->name('class_list');
});

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__ . '/auth.php';
