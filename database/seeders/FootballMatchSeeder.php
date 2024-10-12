<?php

namespace Database\Seeders;

use App\Models\FootballMatch;
use App\Models\FootballTeam;
use App\Models\League;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FootballMatchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    $teams = FootballTeam::all();
    $leagues = League::all();

    $matchCount = FootballMatch::count();

    for ($i = 0; $i < count($teams); $i++) {
        for ($j = $i + 1; $j < count($teams); $j++) {
            if ($matchCount >= 20) {
                return;
            }

            FootballMatch::create([
                'team_id' => $teams[$i]->id,
                'team2_id' => $teams[$j]->id,
                'leagues_id' => $leagues->random()->id,
                'match_datetime' => '2023-03-15 19:00:00',
                'is_game_over' => 0,
            ]);

            $matchCount++;
        }
    }
}

}
