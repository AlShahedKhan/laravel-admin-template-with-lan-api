<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Matchh;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;


class MatchhsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = [
            [
                'series_id' => 1, // Replace with the actual series_id
                'team_id' => 1, // Replace with the actual team_id
                'team2_id' => 2, // Replace with the actual team_id
                'match_datetime' => Carbon::now()->addDays(1),
                'is_game_over' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_id' => 1, // Replace with the actual series_id
                'team_id' => 7, // Replace with the actual team_id
                'team2_id' => 8, // Replace with the actual team_id
                'match_datetime' => Carbon::now()->addDays(1),
                'is_game_over' => 0,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_id' => 2, // Replace with the actual series_id
                'team_id' => 3, // Replace with the actual team_id
                'team2_id' => 4, // Replace with the actual team_id
                'match_datetime' => Carbon::now()->addDays(2),
                'is_game_over' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_id' => 2, // Replace with the actual series_id
                'team_id' => 9, // Replace with the actual team_id
                'team2_id' => 10, // Replace with the actual team_id
                'match_datetime' => Carbon::now()->addDays(2),
                'is_game_over' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_id' => 3, // Replace with the actual series_id
                'team_id' => 5, // Replace with the actual team_id
                'team2_id' => 6, // Replace with the actual team_id
                'match_datetime' => Carbon::now()->addDays(3),
                'is_game_over' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'series_id' => 3, // Replace with the actual series_id
                'team_id' => 11, // Replace with the actual team_id
                'team2_id' => 12, // Replace with the actual team_id
                'match_datetime' => Carbon::now()->addDays(3),
                'is_game_over' => 2,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        DB::table('matchhs')->insert($matches);
    }
}
