<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballPlayer extends Model
{
    use HasFactory;

    protected $fillable = [
        'player_name',
        'goals',
        'assists',
        'man_women',
        'team_id'
    ];

    public function team()
    {
        return $this->belongsTo(FootballTeam::class);
    }
}
