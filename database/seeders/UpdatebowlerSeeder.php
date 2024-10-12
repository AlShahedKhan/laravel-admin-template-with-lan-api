<?php

namespace Database\Seeders;

use App\Models\Updatebowler;

use Illuminate\Database\Seeder;

class UpdateBowlerSeeder extends Seeder
{
    public function run()
    {
        Updatebowler::create([
            'overs' => 0.0,
            'strick' => '*',
            'maidens' => 0,
            'runs' => 0,
            'wickets' => 0,
            'no_balls' => 0,
            'wides' => 0,
            'panalty_runs' => 0,
        ]);
        
        for ($i = 1; $i <= 6; $i++) {
            Updatebowler::create([
                'overs' => $i / 10.0,
                'maidens' => $i,
                'runs' => $i ,
                'wickets' => $i,
                'no_balls' => $i,
                'wides' => $i ,
                'panalty_runs' => $i,
            ]);
        }
        for ($i = 1; $i <= 1000; $i++) {
            Updatebowler::create([
                'overs' => $i / 10.0,
                'maidens' => $i,
                'runs' => $i ,
                'wickets' => $i,
                'no_balls' => $i,
                'wides' => $i ,
                'panalty_runs' => $i,
            ]);
        }
    }
}

