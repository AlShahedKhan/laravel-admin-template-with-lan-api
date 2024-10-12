<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Score;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Series;
use App\Models\Scoreupdate;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class ScoresTableSeeder extends Seeder
{
    public function run()
    {
        $Match1Score1 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 1,
            'player_id' => 1,
            'scoreupdate_id' => 2,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 6,
            'six_id' => 6,
            'balls_played_id' => 50,
            'created_at' => now()
        ];
        $Match1Score2 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 1,
            'player_id' => 2,
            'scoreupdate_id' => 2,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 4,
            'six_id' => 6,
            'balls_played_id' => 60,
            'created_at' => now()
        ];
        $Match1Score3 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 1,
            'player_id' => 3,
            'scoreupdate_id' => 2,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 6,
            'six_id' => 5,
            'balls_played_id' => 70,
            'created_at' => now()
        ];
        $Match1Score4 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 1,
            'player_id' => 4,
            'scoreupdate_id' => 6,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 4,
            'six_id' => 5,
            'balls_played_id' => 70,
            'created_at' => now()
        ];
        $Match1Score5 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 1,
            'player_id' => 5,
            'scoreupdate_id' => 1,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 4,
            'six_id' => 5,
            'balls_played_id' => 70,
            'created_at' => now()
        ];

        DB::table('scores')->insert($Match1Score1);
        DB::table('scores')->insert($Match1Score2);
        DB::table('scores')->insert($Match1Score3);
        DB::table('scores')->insert($Match1Score4);
        DB::table('scores')->insert($Match1Score5);
    }
}
