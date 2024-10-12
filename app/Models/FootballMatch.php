<?php

namespace App\Models;

use App\Models\FootballTeam;
use App\Models\FootballScore;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FootballMatch extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'team2_id',
        'league_id',
        'match_datetime',
        'is_game_over',
    ];
    public $timestamps = true;

    public function leagues(){
        return $this->belongsTo(League::class,'leagues_id','id');
    }

    public function team(){
        return $this->belongsTo(FootballTeam::class,'team_id','id');
    }

    public function team2(){
        return $this->belongsTo(FootballTeam::class,'team2_id','id');
    }

    public function score(){
        return $this->belongsTo(FootballScore::class,'id','match_id');
    }
}
