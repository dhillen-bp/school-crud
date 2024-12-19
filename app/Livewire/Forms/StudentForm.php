<?php

namespace App\Livewire\Forms;

use App\Models\Student;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Masmerise\Toaster\Toaster;

class StudentForm extends Form
{
    public ?Student $student;

    public $name = '';
    public $class_id = '';
    public $student_number = '';
    public $gender = '';

    public function rules()
    {
        return [
            'name' => 'required',
            'class_id' => 'required|exists:classes,id',
            'student_number' => 'required|unique:students|digits:16|numeric',
            'gender' => 'required|in:male,female',
        ];
    }
    public function messages(): array
    {
        return [
            'name.required' => 'Nama siswa wajib diisi',
            'class_id.required' => 'Kelas wajib dipilih.',
            'class_id.exists' => 'Kelas tidak valid.',
            'student_number.required' => 'NISN wajib diisi',
            'student_number.unique' => 'NISN harus unik!',
            'student_number.digits' => 'NISN harus 10 digit.',
            'student_number.numeric' => 'NISN harus berupa angka.',
            'gender.required' => 'Jenis kelamin wajib dipilih.',
            'gender.in' => 'Jenis kelamin tidak valid.',
        ];
    }

    public function setStudent(Student $student)
    {
        $this->student = $student;
        $this->name = $student->name;
        $this->class_id = $student->class_id;
        $this->student_number = $student->student_number;
        $this->gender = $student->gender;
    }

    public function store()
    {
        $this->validate();

        Student::create(
            $this->validate()
        );

        Toaster::success('Student successfully created!');
    }

    public function update()
    {
        $this->validate();
        $this->student->update([
            'name' => $this->name,
            'class_id' => $this->class_id,
            'student_number' => $this->student_number,
            'gender' => $this->gender,
        ]);

        Toaster::success('Student successfully updated!');
    }
}
