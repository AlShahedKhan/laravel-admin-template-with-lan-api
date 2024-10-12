<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'name' => 'Afghanistan',
            ],
            [
                'name' => 'Australia',
            ],
            [
                'name' => 'Bangladesh',
            ],
            [
                'name' => 'England',
            ],
            [
                'name' => 'India',
            ],
            [
                'name' => 'Ireland',
            ],
            [
                'name' => 'New Zealand',
            ],
            [
                'name' => 'Pakistan',
            ],
            [
                'name' => 'South Africa',
            ],
            [
                'name' => 'Sri Lanka',
            ],
            [
                'name' => 'West Indies',
            ],
            [
                'name' => 'Zimbabwe',
            ],
            [
                'name' => 'Nepal',
            ],
            [
                'name' => 'United Arab Emirates',
            ],
            // Add values for the remaining teams
        ];

        foreach ($teams as $team) {
            DB::table('teams')->insert([
                'team_name' => $team['name'],
                'team_slug' => Str::slug($team['name']),
                't_20_ranking' => rand(50, 200),
                'odi_ranking' => rand(50, 200),
                'test_ranking' => rand(50, 200),
                'w_t_20_ranking' => rand(50, 200),
                'w_odi_ranking' => rand(50, 200),
                'w_test_ranking' => rand(50, 200),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
