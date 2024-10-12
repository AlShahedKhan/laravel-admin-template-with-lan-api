<?php

namespace Database\Seeders;

use App\Models\Scoreupdate;
use Illuminate\Database\Seeder;

class ScoreUpdateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Scoreupdate::create([
            'out_type' => '*',
            'out_by_type' => '.',
            'one' => 0,
            'two' => 0,
            'three' => 0,
            'four' => 0,
            'six' => 0,
            'balls_played' => 0,
        ]);

        Scoreupdate::create([
            'out_type' => 'b',
            'out_by_type' => null,
            'one' => 1,
            'two' => 1,
            'three' => 1,
            'four' => 1,
            'six' => 1,
            'balls_played' => 1,
        ]);

        Scoreupdate::create([
            'out_type' => 'c',
            'out_by_type' => null,
            'one' => 2,
            'two' => 2,
            'three' => 2,
            'four' => 2,
            'six' => 2,
            'balls_played' => 2,
        ]);

        Scoreupdate::create([
            'out_type' => 'lbw',
            'out_by_type' => null,
            'one' => 3,
            'two' => 3,
            'three' => 3,
            'four' => 3,
            'six' => 3,
            'balls_played' => 3,
        ]);

        Scoreupdate::create([
            'out_type' => 'ro',
            'out_by_type' => null,
            'one' => 4,
            'two' => 4,
            'three' => 4,
            'four' => 4,
            'six' => 4,
            'balls_played' => 4,
        ]);

        Scoreupdate::create([
            'out_type' => 'not out',
            'out_by_type' => null,
            'one' => 5,
            'two' => 5,
            'three' => 5,
            'four' => 5,
            'six' => 5,
            'balls_played' => 5,
        ]);

        Scoreupdate::create([
            'out_type' => 'hw',
            'one' => 6,
            'two' => 6,
            'three' => 6,
            'four' => 6,
            'six' => 6,
            'balls_played' => 6,
        ]);

        Scoreupdate::create([
            'out_type' => 'h',
            'one' => 7,
            'two' => 7,
            'three' => 7,
            'four' => 7,
            'six' => 7,
            'balls_played' => 7,
        ]);

        Scoreupdate::create([
            'out_type' => 'o',
            'one' => 8,
            'two' => 8,
            'three' => 8,
            'four' => 8,
            'six' => 8,
            'balls_played' => 8,
        ]);

        Scoreupdate::create([
            'out_type' => 't',
            'one' => 9,
            'two' => 9,
            'three' => 9,
            'four' => 9,
            'six' => 9,
            'balls_played' => 9,
        ]);

        Scoreupdate::create([
            'out_type' => 'rh',
            'one' => 10,
            'two' => 10,
            'three' => 10,
            'four' => 10,
            'six' => 10,
            'balls_played' => 10,
        ]);

        for ($i = 11; $i <= 200; $i++) {
            Scoreupdate::create([
                'one' => $i,
                'two' => $i,
                'three' => $i,
                'four' => $i,
                'six' => $i,
                'balls_played' => $i,
            ]);
        }
    }
}
