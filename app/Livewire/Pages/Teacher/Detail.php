<?php

namespace App\Livewire\Pages\Teacher;

use App\Models\Teacher;
use Livewire\Component;

class Detail extends Component
{
    public $teacher;

    public function mount(Teacher $teacher)
    {
        $this->teacher = Teacher::with('class')->where('id', $teacher->id)->first();
    }

    public function render()
    {
        return view('livewire.pages.teacher.detail');
    }
}
