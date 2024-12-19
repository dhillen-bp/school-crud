<?php

namespace App\Livewire\Pages\Student;

use App\Livewire\Forms\StudentForm;
use App\Models\ClassModel;
use Livewire\Component;

class Create extends Component
{
    public StudentForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect(route('student.index'));
    }

    public function render()
    {
        $classes = ClassModel::all();
        return view('livewire.pages.student.create', ['classes' => $classes]);
    }
}
