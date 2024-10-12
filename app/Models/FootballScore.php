<?php

namespace App\Models;

use App\Models\GoalScore;
use App\Models\FootballTeam;
use App\Models\FootballMatch;
use App\Models\FootballPlayer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FootballScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'team2_id',
        'match_id',
        'goal_id',
        'goal2_id',
        'shots_id',
        'shots2_id',
        'shots_on_target_id',
        'shots_on_target2_id',
        'prossession_id',
        'prossession2_id',
        'passes_id',
        'passes2_id',
        'passes_accuracy_id',
        'passes_accuracy2_id',
        'fouls_id',
        'fouls2_id',
        'yellow_cards_id',
        'yellow_cards2_id',
        'red_cards_id',
        'red_cards2_id',
        'off_sides_id',
        'off_sides2_id',
        'corners_id',
        'corners2_id',
    ];

    public function matchh()
    {
        return $this->belongsTo(FootballMatch::class, 'match_id');
    }
    public function team()
    {
        return $this->belongsTo(FootballTeam::class, 'team_id');
    }
    public function team2()
    {
        return $this->belongsTo(FootballTeam::class, 'team2_id');
    }
    public function goal()
    {
        return $this->belongsTo(GoalScore::class, 'goal_id');
    }
    public function goal2()
    {
        return $this->belongsTo(GoalScore::class, 'goal2_id');
    }

    public function shots()
    {
        return $this->belongsTo(GoalScore::class, 'shots_id');
    }
    public function shots2()
    {
        return $this->belongsTo(GoalScore::class, 'shots2_id');
    }
    public function shots_on_target()
    {
        return $this->belongsTo(GoalScore::class, 'shots_on_target_id');
    }
    public function shots_on_target2()
    {
        return $this->belongsTo(GoalScore::class, 'shots_on_target2_id');
    }
    public function prossession()
    {
        return $this->belongsTo(GoalScore::class, 'prossession_id');
    }
    public function prossession2()
    {
        return $this->belongsTo(GoalScore::class, 'prossession2_id');
    }
    public function passes()
    {
        return $this->belongsTo(GoalScore::class, 'passes_id');
    }
    public function passes2()
    {
        return $this->belongsTo(GoalScore::class, 'passes2_id');
    }
    public function passes_accuracy()
    {
        return $this->belongsTo(GoalScore::class, 'passes_accuracy_id');
    }
    public function passes_accuracy2()
    {
        return $this->belongsTo(GoalScore::class, 'passes_accuracy2_id');
    }
    public function fouls()
    {
        return $this->belongsTo(GoalScore::class, 'fouls_id');
    }
    public function fouls2()
    {
        return $this->belongsTo(GoalScore::class, 'fouls2_id');
    }
    public function yellow_cards()
    {
        return $this->belongsTo(GoalScore::class, 'yellow_cards_id');
    }
    public function yellow_cards2()
    {
        return $this->belongsTo(GoalScore::class, 'yellow_cards2_id');
    }
    public function red_cards()
    {
        return $this->belongsTo(GoalScore::class, 'red_cards_id');
    }
    public function red_cards2()
    {
        return $this->belongsTo(GoalScore::class, 'red_cards2_id');
    }
    public function off_sides()
    {
        return $this->belongsTo(GoalScore::class, 'off_sides_id');
    }
    public function off_sides2()
    {
        return $this->belongsTo(GoalScore::class, 'off_sides2_id');
    }
    public function corners()
    {
        return $this->belongsTo(GoalScore::class, 'corners_id');
    }
    public function corners2()
    {
        return $this->belongsTo(GoalScore::class, 'corners2_id');
    }
}
