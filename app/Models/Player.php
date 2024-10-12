<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Ranking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Player extends Model
{
    use HasFactory;
    protected $fillable = [
        'player_name',
        'player_slug',
        'player_runs',
        'player_wickets',
        'man_women',
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class);
    }

    public function points()
    {
        return $this->hasMany(Point::class);
    }

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }
}
