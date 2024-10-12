<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Point;
use App\Models\Player;
use App\Models\Ranking;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Nette\Utils\Random;

class RankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = Team::all();
        $players = Player::all();
        $points = Point::all();

        foreach ($teams as $team) {
            foreach ($players as $player) {
                $ranking = new Ranking;
                $ranking->team_id = $team->id;
                $ranking->player_id = $player->id;
                $ranking->man_women_id = $player->id; // Assign the player's ID as the value
                $ranking->point_id = $points->random()->id;
                $ranking->w_t20_batter_points_id = $points->random()->id;
                $ranking->t20_bowler_points_id = $points->random()->id;
                $ranking->w_t20_bowler_points_id = $points->random()->id;
                $ranking->odi_batter_points_id = $points->random()->id;
                $ranking->w_odi_batter_points_id = $points->random()->id;
                $ranking->odi_bowler_points_id = $points->random()->id;
                $ranking->w_odi_bowler_points_id = $points->random()->id;
                $ranking->test_batter_points_id = $points->random()->id;
                $ranking->w_test_batter_points_id = $points->random()->id;
                $ranking->test_bowler_points_id = $points->random()->id;
                $ranking->w_test_bowler_points_id = $points->random()->id;
                $ranking->save();
            }
        }
    }
}
