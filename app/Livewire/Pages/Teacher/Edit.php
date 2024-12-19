<?php

namespace App\Livewire\Pages\Teacher;

use App\Livewire\Forms\TeacherForm;
use App\Models\ClassModel;
use App\Models\Teacher;
use Livewire\Component;

class Edit extends Component
{
    public TeacherForm $form;

    public function mount(Teacher $teacher)
    {
        $this->form->setTeacher($teacher);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('teacher.index'), navigate: true);
    }

    public function render()
    {
        $classes = ClassModel::all();
        return view('livewire.pages.teacher.edit', ['classes' => $classes]);
    }
}
