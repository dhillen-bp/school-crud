<?php

namespace Database\Seeders;

use App\Models\ClassModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'class_name' => '1',
                'code' => 'A',
            ],
            [
                'class_name' => '1',
                'code' => 'B',
            ],
            [
                'class_name' => '1',
                'code' => 'C',
            ],
            [
                'class_name' => '2',
                'code' => 'A',
            ],
            [
                'class_name' => '2',
                'code' => 'B',
            ],
            [
                'class_name' => '3',
                'code' => 'A',
            ],
            [
                'class_name' => '4',
                'code' => 'A',
            ],
            [
                'class_name' => '5',
                'code' => 'A',
            ],
            [
                'class_name' => '6',
                'code' => 'A',
            ],
        ];

        foreach ($data as $item) {
            ClassModel::create($item);
        }
    }
}
