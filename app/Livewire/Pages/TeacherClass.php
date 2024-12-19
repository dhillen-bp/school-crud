<?php

namespace App\Livewire\Pages;

use App\Models\ClassModel;
use Livewire\Component;

class TeacherClass extends Component
{
    public function render()
    {
        $classes = ClassModel::with('students')->paginate(3);
        return view('livewire.pages.teacher-class', compact('classes'));
    }
}
