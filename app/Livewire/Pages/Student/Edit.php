<?php

namespace App\Livewire\Pages\Student;

use App\Livewire\Forms\StudentForm;
use App\Models\ClassModel;
use App\Models\Student;
use Livewire\Component;

class Edit extends Component
{
    public StudentForm $form;

    public function mount(Student $student)
    {
        $this->form->setStudent($student);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('student.index'), navigate: true);
    }

    public function render()
    {
        $classes = ClassModel::all();
        return view('livewire.pages.student.edit', ['classes' => $classes]);
    }
}
