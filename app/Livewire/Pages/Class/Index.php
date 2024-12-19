<?php

namespace App\Livewire\Pages\Class;

use App\Models\ClassModel;
use Livewire\Component;
use Masmerise\Toaster\Toaster;

class Index extends Component
{
    public function destroy($id)
    {
        ClassModel::destroy($id);

        Toaster::success('Class successfully deleted!');

        // Redirect atau refresh
        $this->redirect(route('class.index'), navigate: true);
    }

    public function render()
    {
        $classes = ClassModel::all();
        return view('livewire.pages.class.index', ['classes' => $classes]);
    }
}
