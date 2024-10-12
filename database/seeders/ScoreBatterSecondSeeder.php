<?php

namespace Database\Seeders;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Scoreupdate;
use Illuminate\Database\Seeder;
use App\Models\Scorebattersecond;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ScoreBatterSecondSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = Matchh::all();
        $teams = Team::all();
        $players = Player::all();
        $scoreupdates = Scoreupdate::all();
    
        foreach ($matches as $match) {
            $scoresPerMatch = 5;
            $scoreCount = 0;
    
            while ($scoreCount < $scoresPerMatch) {
                $team = $teams->random();
                $player = $players->random();
                $scoreupdate = $scoreupdates->random();
    
                Scorebattersecond::create([
                    'match_id' => $match->id,
                    'team_id' => $team->id,
                    'player_id' => $player->id,
                    'scoreupdate_id' => $scoreupdate->id,
                    'outby_id' => $scoreupdate->id,
                    'one_id' => $scoreupdate->id,
                    'two_id' => $scoreupdate->id,
                    'three_id' => $scoreupdate->id,
                    'four_id' => $scoreupdate->id,
                    'six_id' => $scoreupdate->id,
                    'balls_played_id' => $scoreupdate->id,
                ]);
    
                $scoreCount++;
            }
        }
    }
    
}
