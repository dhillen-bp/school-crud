<?php

namespace App\Livewire\Pages\Teacher;

use App\Models\Teacher;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    public function destroy($id)
    {
        Teacher::destroy($id);

        Toaster::success('Teacher successfully deleted!');

        // Redirect atau refresh
        $this->redirect(route('teacher.index'), navigate: true);
    }

    public function render()
    {
        $teachers = Teacher::all();
        return view('livewire.pages.teacher.index', ['teachers' => $teachers]);
    }
}
