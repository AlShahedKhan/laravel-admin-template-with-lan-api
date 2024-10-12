<?php

namespace Database\Seeders;

use App\Models\FootballPlayer;
use App\Models\FootballRanking;
use App\Models\FootballTeam;
use App\Models\Point;
use App\Models\Team;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class FootballRankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = FootballTeam::all();
        $players = FootballPlayer::all();
        $points = Point::all();

        foreach ($teams as $team) {
            foreach ($players as $player) {
                $ranking = new FootballRanking;
                $ranking->team_id = $team->id;
                $ranking->player_id = $player->id;
                $ranking->man_women_id = $player->id; // Assign the player's ID as the value
                $ranking->man_points_id = $points->random()->id;
                $ranking->woman_points_id = $points->random()->id;
                $ranking->year = now()->year;
                $ranking->month = now()->month;
                $ranking->save();
            }
        }
    }
}
