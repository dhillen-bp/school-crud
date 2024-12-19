<?php

namespace App\Livewire\Pages\Class;

use App\Livewire\Forms\ClassForm;
use Livewire\Component;

class Create extends Component
{
    public ClassForm $form;

    public function save()
    {
        $this->form->store();

        return $this->redirect(route('class.index'));
    }

    public function render()
    {
        return view('livewire.pages.class.create');
    }
}
