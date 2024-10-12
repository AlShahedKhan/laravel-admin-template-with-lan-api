<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Point;
use App\Models\Player;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ranking extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'player_id',
        'man_women_id',
        'point_id',
        'w_t20_batter_points_id',
        't20_bowler_points_id',
        'w_t20_bowler_points_id',
        'odi_batter_points_id',
        'w_odi_batter_points_id',
        'odi_bowler_points_id',
        'w_odi_bowler_points_id',
        'test_batter_points_id',
        'w_test_batter_points_id',
        'test_bowler_points_id',
        'w_test_bowler_points_id',
        'year',
        'month'
    ];

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function man_women()
    {
        return $this->belongsTo(Player::class, 'man_women_id');
    }

    public function point()
    {
        return $this->belongsTo(Point::class, 'point_id');
    }
    public function w_t20_batter_points()
    {
        return $this->belongsTo(Point::class, 'w_t20_batter_points_id');
    }
    public function t20_bowler_points()
    {
        return $this->belongsTo(Point::class, 't20_bowler_points_id');
    }
    public function w_t20_bowler_points()
    {
        return $this->belongsTo(Point::class, 'w_t20_bowler_points_id');
    }
    public function odi_batter_points()
    {
        return $this->belongsTo(Point::class, 'odi_batter_points_id');
    }
    public function w_odi_batter_points()
    {
        return $this->belongsTo(Point::class, 'w_odi_batter_points_id');
    }
    public function odi_bowler_points()
    {
        return $this->belongsTo(Point::class, 'odi_bowler_points_id');
    }
    public function w_odi_bowler_points()
    {
        return $this->belongsTo(Point::class, 'w_odi_bowler_points_id');
    }
    public function test_batter_points()
    {
        return $this->belongsTo(Point::class, 'test_batter_points_id');
    }
    public function w_test_batter_points()
    {
        return $this->belongsTo(Point::class, 'w_test_batter_points_id');
    }
    public function test_bowler_points()
    {
        return $this->belongsTo(Point::class, 'test_bowler_points_id');
    }
    public function w_test_bowler_points()
    {
        return $this->belongsTo(Point::class, 'w_test_bowler_points_id');
    }
}
