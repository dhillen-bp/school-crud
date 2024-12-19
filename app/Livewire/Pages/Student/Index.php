<?php

namespace App\Livewire\Pages\Student;

use App\Models\ClassModel;
use App\Models\Student;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    public function destroy($id)
    {
        Student::destroy($id);

        Toaster::success('Student successfully deleted!');

        // Redirect atau refresh
        $this->redirect(route('student.index'), navigate: true);
    }

    public function render()
    {
        $students = Student::all();

        return view('livewire.pages.student.index', ['students' => $students]);
    }
}
