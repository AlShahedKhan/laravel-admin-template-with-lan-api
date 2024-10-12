<?php

namespace Database\Seeders;

use Faker\Factory;
use App\Models\FootballScore;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FootballScoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            FootballScore::create([
                'match_id' => $i,
                'team_id' => $faker->numberBetween(1, 20),
                'team2_id' => $faker->numberBetween(1, 20),
                'goal_id' => $faker->numberBetween(1, 20),
                'goal2_id' => $faker->numberBetween(1, 20),
                'shots_id' => $faker->numberBetween(1, 20),
                'shots2_id' => $faker->numberBetween(1, 20),
                'shots_on_target_id' => $faker->numberBetween(1, 20),
                'shots_on_target2_id' => $faker->numberBetween(1, 20),
                'prossession_id' => $faker->numberBetween(1, 20),
                'prossession2_id' => $faker->numberBetween(1, 20),
                'passes_id' => $faker->numberBetween(1, 20),
                'passes2_id' => $faker->numberBetween(1, 20),
                'passes_accuracy_id' => $faker->numberBetween(1, 20),
                'passes_accuracy2_id' => $faker->numberBetween(1, 20),
                'fouls_id' => $faker->numberBetween(1, 20),
                'fouls2_id' => $faker->numberBetween(1, 20),
                'yellow_cards_id' => $faker->numberBetween(1, 20),
                'yellow_cards2_id' => $faker->numberBetween(1, 20),
                'red_cards_id' => $faker->numberBetween(1, 20),
                'red_cards2_id' => $faker->numberBetween(1, 20),
                'off_sides_id' => $faker->numberBetween(1, 20),
                'off_sides2_id' => $faker->numberBetween(1, 20),
                'corners_id' => $faker->numberBetween(1, 20),
                'corners2_id' => $faker->numberBetween(1, 20),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }

}
