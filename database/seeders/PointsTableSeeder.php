<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PointsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $value = 50; // Initial value

        for ($i = 1; $i <= 150; $i++) {
            DB::table('points')->insert([
                'points' => $value,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $value++; // Increment the value by 1 for the next iteration
        }
    }
}
