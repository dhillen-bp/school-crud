<?php

namespace App\Livewire\Pages\Class;

use App\Livewire\Forms\ClassForm;
use App\Models\ClassModel;
use Livewire\Component;

class Edit extends Component
{
    public ClassForm $form;

    public function mount(ClassModel $class)
    {
        $this->form->setClass($class);
    }

    public function save()
    {
        $this->form->update();

        return $this->redirect(route('class.index'), navigate: true);
    }

    public function render()
    {
        return view('livewire.pages.class.edit');
    }
}
