<?php

namespace App\Livewire\Pages;

use App\Models\ClassModel;
use Livewire\Component;

class ClassStudentTeacher extends Component
{
    public function render()
    {
        $classes = ClassModel::with('students', 'teachers')->paginate(3);
        return view('livewire.pages.class-student-teacher', compact('classes'));
    }
}
