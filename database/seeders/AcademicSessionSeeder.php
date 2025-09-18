<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AcademicSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($year = 2022; $year <= 2029; $year++) {
            $startDate = Carbon::create($year, 4, 1); // April 1 of current year
            $endDate = Carbon::create($year + 1, 3, 31); // March 31 of next year

            DB::table('academic_sessions')->insert([
                'name' => "{$year}-" . ($year + 1),
                'start_date' => $startDate->toDateString(),
                'end_date' => $endDate->toDateString(),
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // Optionally mark the current session as active
        DB::table('academic_sessions')->where('name', '2025-2026')->update(['is_active' => true]);
    }
}
