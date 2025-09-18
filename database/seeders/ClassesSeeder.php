<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassesSeeder extends Seeder
{
    public function run()
    {
        $classes = [
            ['name' => 'Playgroup', 'numeric' => 'Playgroup'],
            ['name' => 'Nursery',   'numeric' => 'Nursery'],
            ['name' => 'LKG',       'numeric' => 'LKG'],
            ['name' => 'UKG',       'numeric' => 'UKG'],
            ['name' => '1st',       'numeric' => '1'],
            ['name' => '2nd',       'numeric' => '2'],
            ['name' => '3rd',       'numeric' => '3'],
            ['name' => '4th',       'numeric' => '4'],
            ['name' => '5th',       'numeric' => '5'],
            ['name' => '6th',       'numeric' => '6'],
            ['name' => '7th',       'numeric' => '7'],
            ['name' => '8th',       'numeric' => '8'],
            ['name' => '9th',       'numeric' => '9'],
            ['name' => '10th',      'numeric' => '10'],
            ['name' => '11th',      'numeric' => '11'],
            ['name' => '12th',      'numeric' => '12'],
        ];

        foreach ($classes as $class) {
            DB::table('classes')->insert([
                'name' => $class['name'],
                'numeric' => $class['numeric'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
