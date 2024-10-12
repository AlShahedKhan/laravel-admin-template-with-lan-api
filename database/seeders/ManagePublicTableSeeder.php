<?php

namespace Database\Seeders;

use App\Models\Matchh;
use Illuminate\Database\Seeder;
use App\Models\ManagePublicTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ManagePublicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $matches = Matchh::all();

        foreach ($matches as $match) {
            ManagePublicTable::create([
                'match_id' => $match->id,
                'table_number' => rand(2, 4),
                'targeted_runs' => rand(100, 300),
                'targeted_overs' => '20',
            ]);
        }
    }

}