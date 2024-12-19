<?php

namespace App\Livewire\Forms;

use App\Models\ClassModel;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;

class ClassForm extends Form
{
    public ?ClassModel $class;

    public $class_name = '';
    public $code = '';


    public function rules()
    {
        return [
            'class_name' => 'required',
            'code' => 'required|unique:classes,code,NULL,id,class_name,' . $this->class_name,
        ];
    }
    public function messages(): array
    {
        return [
            'class_name.required' => 'Nama kelas wajib diisi',
            'code.required' => 'Kode kelas wajib diisi',
            'code.unique' => 'Kode kelas sudah ada pada nama kelas ini!',
        ];
    }

    public function setClass(ClassModel $class)
    {
        $this->class = $class;
        $this->class_name = $class->class_name;
        $this->code = $class->code;
    }

    public function store()
    {
        $this->validate();

        ClassModel::create(
            $this->validate()
        );

        Toaster::success('Class successfully created!');
    }

    public function update()
    {
        $this->validate();
        $this->class->update([
            'class_name' => $this->class_name,
            'code' => $this->code,
        ]);

        Toaster::success('Class successfully updated!');
    }
}
