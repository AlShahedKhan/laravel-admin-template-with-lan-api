<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class BatterSecondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Match1Score1 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 2,
            'player_id' => 1,
            'scoreupdate_id' => 2,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 6,
            'six_id' => 6,
            'balls_played_id' => 60,
            'created_at' => now()
        ];
        $Match1Score2 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 2,
            'player_id' => 2,
            'scoreupdate_id' => 2,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 6,
            'six_id' => 6,
            'balls_played_id' => 60,
            'created_at' => now()
        ];
        $Match1Score3 = [
            'series_id' => 1,
            'match_id' => 1,
            'team_id' => 2,
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
            'team_id' => 2,
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
            'team_id' => 2,
            'player_id' => 5,
            'scoreupdate_id' => 1,
            'outby_id' => 1,
            'one_id' => 6,
            'two_id' => 6,
            'three_id' => 2,
            'four_id' => 4,
            'six_id' => 3,
            'balls_played_id' => 70,
            'created_at' => now()
        ];

        DB::table('scorebatterseconds')->insert($Match1Score1);
        DB::table('scorebatterseconds')->insert($Match1Score2);
        DB::table('scorebatterseconds')->insert($Match1Score3);
        DB::table('scorebatterseconds')->insert($Match1Score4);
        DB::table('scorebatterseconds')->insert($Match1Score5);
    }
}
