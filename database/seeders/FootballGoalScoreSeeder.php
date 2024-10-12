<?php

namespace Database\Seeders;

use App\Models\GoalScore;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FootballGoalScoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for ($i=0; $i <=2000 ; $i++) { 
            GoalScore::create([
                'goal'    => $i,
                'shots' => $i,
                'shots_on_target' => $i,
                'prossession' => $i,
                'passes' => $i,
                'passes_accuracy' => $i,
                'fouls' => $i,
                'yellow_cards' => $i,
                'red_cards' => $i,
                'off_sides' => $i,
                'corners' => $i
            ]);
        };
    }
}
