<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        for ($i = 1; $i <= 50; $i++) {
            $yearSuffix = substr($faker->year($max = '2005'), -3);

            $randomDigits = $faker->unique()->numerify('#######');

            $nisn = $yearSuffix . $randomDigits;

            Student::create([
                'class_id' => $faker->numberBetween(1, 6),
                'name' => $faker->name(),
                'student_number' => $nisn,
                'gender' => $faker->randomElement(['male', 'female']),
            ]);
        }
    }
}
