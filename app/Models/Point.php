<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Ranking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Point extends Model
{
    protected $fillable = [
        'points',
        't20_bowler_points',
        'odi_batter_points',
        'odi_bowler_points',
        'test_batter_points',
        'test_bowler_points'
    ];

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }
}
