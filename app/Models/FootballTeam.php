<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FootballTeam extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'man_team_points',
        'women_team_points',
    ];
}
