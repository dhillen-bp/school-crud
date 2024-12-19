<?php

namespace App\Livewire\Pages\Class;

use App\Models\ClassModel;
use Livewire\Component;

class Filter extends Component
{
    public ClassModel $class;

    public function mount(ClassModel $class)
    {
        $this->class = $class;
    }

    public function render()
    {
        $class = ClassModel::with('teachers', 'students')->where('id', $this->class->id);

        return view('livewire.pages.class.filter', ['class' => $class]);
    }
}
