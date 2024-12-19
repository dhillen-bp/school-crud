<?php

namespace App\Livewire\Forms;

use App\Models\Teacher;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;

class TeacherForm extends Form
{
    public ?Teacher $teacher;

    public $name = '';
    public $class_id = '';
    public $teacher_number = '';
    public $gender = '';

    public function rules()
    {
        return [
            'name' => 'required',
            'class_id' => 'required|exists:classes,id',
            'teacher_number' => 'required|unique:students|digits:16|numeric',
            'gender' => 'required|in:male,female',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama siswa wajib diisi',
            'class_id.required' => 'Kelas wajib dipilih.',
            'class_id.exists' => 'Kelas tidak valid.',
            'teacher_number.required' => 'Nomor Induk Guru wajib diisi',
            'teacher_number.unique' => 'Nomor Induk Guru harus unik.',
            'teacher_number.digits' => 'Nomor Induk Guru harus 16 digit.',
            'teacher_number.numeric' => 'Nomor Induk Guru harus berupa angka.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin tidak valid.',
        ];
    }

    public function setTeacher(Teacher $teacher)
    {
        $this->teacher = $teacher;
        $this->name = $teacher->name;
        $this->class_id = $teacher->class_id;
        $this->teacher_number = $teacher->teacher_number;
        $this->gender = $teacher->gender;
    }

    public function store()
    {
        $this->validate();

        Teacher::create(
            $this->validate()
        );

        Toaster::success('Teacher successfully created.');
    }

    public function update()
    {
        $this->validate();
        $this->teacher->update([
            'name' => $this->name,
            'class_id' => $this->class_id,
            'student_number' => $this->teacher_number,
            'gender' => $this->gender,
        ]);

        Toaster::success('Teacher successfully updated.');
    }
}
