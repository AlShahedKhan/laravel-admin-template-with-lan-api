<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SeriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $series = [
            [
                'series_name' => 'Series A',
                'team_id' => 1, // replace with the actual team_id
                'venue' => 'Bangladesh',
                'series_start_time' => Carbon::now(),
                'series_end_time' => Carbon::now()->addDays(7),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_name' => 'Series B',
                'team_id' => 2, // replace with the actual team_id
                'venue' => 'India',
                'series_start_time' => Carbon::now(),
                'series_end_time' => Carbon::now()->addDays(14),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_name' => 'Series C',
                'team_id' => 3, // replace with the actual team_id
                'venue' => 'Venue C',
                'series_start_time' => Carbon::now(),
                'series_end_time' => Carbon::now()->addDays(21),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('series')->insert($series);
    }

}
