<?php

namespace App\Livewire\Pages\Teacher;

use App\Models\ClassModel;
use App\Models\Teacher;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    public $selectedClass = null;

    public function updatedSelectedClass()
    {
        $this->dispatch('filterUpdated', $this->selectedClass);
    }

    public function destroy($id)
    {
        Teacher::destroy($id);

        Toaster::success('Teacher successfully deleted!');

        // Redirect atau refresh
        $this->redirect(route('teacher.index'), navigate: true);
    }

    public function render()
    {
        $teachers = Teacher::with('class')
            ->when($this->selectedClass, function ($query) {
                return $query->where('class_id', $this->selectedClass);
            })
            ->get();
        $classes = ClassModel::all();

        return view('livewire.pages.teacher.index', ['teachers' => $teachers, 'classes' => $classes]);
    }
}
