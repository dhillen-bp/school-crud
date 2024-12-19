<?php

namespace App\Livewire\Pages\Student;

use App\Models\ClassModel;
use App\Models\Student;
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
        Student::destroy($id);

        Toaster::success('Student successfully deleted!');

        $this->redirect(route('student.index'), navigate: true);
    }

    public function render()
    {
        $students = Student::with('class')
            ->when($this->selectedClass, function ($query) {
                return $query->where('class_id', $this->selectedClass);
            })
            ->get();
        $classes = ClassModel::all();

        return view('livewire.pages.student.index', ['students' => $students, 'classes' => $classes]);
    }
}
