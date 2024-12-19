<?php

namespace App\Livewire\Pages\Teacher;

use App\Livewire\Forms\TeacherForm;
use App\Models\ClassModel;
use Livewire\Component;

class Create extends Component
{
    public TeacherForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect(route('teacher.index'));
    }

    public function render()
    {
        $classes = ClassModel::all();
        return view('livewire.pages.teacher.create', ['classes' => $classes]);
    }
}
