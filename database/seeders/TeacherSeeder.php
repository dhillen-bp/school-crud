<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();
        $classes = ClassModel::pluck('id');

        for ($i = 1; $i <= 20; $i++) {

            $teacherNumber = $faker->unique()->numerify('################');

            Teacher::create([
                'name' => $faker->name(),
                'teacher_number' => $teacherNumber,
                'gender' => $faker->randomElement(['male', 'female']),
                'class_id' => $faker->randomElement($classes),
            ]);
        }
    }
}
