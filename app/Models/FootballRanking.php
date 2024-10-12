<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Point;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FootballRanking extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'player_id',
        'man_women_id',
        'man_points_id',
        'woman_points_id',
        'year',
        'month'
    ];

    public function team()
    {
        return $this->belongsTo(FootballTeam::class, 'team_id');
    }
    public function player()
    {
        return $this->belongsTo(FootballPlayer::class, 'player_id');
    }
    public function man_women()
    {
        return $this->belongsTo(FootballPlayer::class, 'man_women_id');
    }
    public function ManPoints()
    {
        return $this->belongsTo(Point::class, 'man_points_id');
    }
    public function WomanPoints()
    {
        return $this->belongsTo(Point::class, 'woman_points_id');
    }
}
