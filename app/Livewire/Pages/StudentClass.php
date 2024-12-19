<?php

namespace App\Livewire\Pages;

use App\Models\ClassModel;
use App\Models\Student;
use Livewire\Component;

class StudentClass extends Component
{
    public function render()
    {
        $classes = ClassModel::with('students')->paginate(3);

        return view('livewire.pages.student-class', compact('classes'));
    }
}
