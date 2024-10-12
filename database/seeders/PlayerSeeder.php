<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Player;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();

        foreach ($teams as $team) {
            $players = [
                ['name' => 'Player 1'],
                ['name' => 'Player 2'],
                ['name' => 'Player 3'],
                // Add more players as needed
            ];

            foreach ($players as $playerData) {
                Player::create([
                    'team_id' => $team->id,
                    'player_name' => $playerData['name'],
                    'player_slug' => Str::slug($playerData['name']),
                    'player_runs' => rand(50, 200),
                    'player_wickets' => rand(50, 200),
                    'man_women' => 'm', // Set the appropriate value here
                ]);
                Player::create([
                    'team_id' => $team->id,
                    'player_name' => $playerData['name'],
                    'player_slug' => Str::slug($playerData['name']),
                    'player_runs' => rand(50, 200),
                    'player_wickets' => rand(50, 200),
                    'man_women' => 'w', // Set the appropriate value here
                ]);
            }
        }
    }
}
