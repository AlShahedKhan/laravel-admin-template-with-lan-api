<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use App\Models\FootballTeam;
use App\Models\FootballPlayer;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FootballPlayerSeeder extends Seeder
{
    public function run()
    {
        $teams = DB::table('football_teams')->pluck('id');
        $playerNames = [
            'Player 1',
            'Player 2',
            'Player 3',
            'Player 4',
            'Player 5',
            // Add more player names as needed
        ];

        foreach ($teams as $teamId) {
            foreach ($playerNames as $playerName) {
                $goals = rand(0, 1000);
                $assists = rand(0, 1000);
                $manWomen = (rand(0, 1) === 0) ? 'm' : 'w';

                DB::table('football_players')->insert([
                    'team_id' => $teamId,
                    'player_name' => $playerName,
                    'goals' => $goals,
                    'assists' => $assists,
                    'man_women' => $manWomen,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
