<?php

namespace Database\Seeders;

use App\Models\League;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeaguesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $leagues = [
            [
                'league_name' => 'Premier League',
                'venue' => 'Some Stadium',
                'league_start_time' => '2023-01-01 00:00:00',
                'league_end_time' => '2023-12-31 23:59:59',
            ],
            [
                'league_name' => 'La Liga',
                'venue' => 'Another Stadium',
                'league_start_time' => '2023-02-01 00:00:00',
                'league_end_time' => '2023-11-30 23:59:59',
            ],
            // Add more leagues as needed
        ];

        foreach ($leagues as $league) {
            League::create($league);
        }
    }
}
