<?php

namespace App\Livewire\Pages\Student;

use App\Models\Student;
use Livewire\Component;

class Detail extends Component
{
    public $student;

    public function mount(Student $student)
    {
        $this->student = Student::with('class')->where('id', $student->id)->first();
    }

    public function render()
    {
        return view('livewire.pages.student.detail');
    }
}
