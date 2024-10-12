<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Series;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Matchh extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id',
        'team_id',
        'team2_id',
        'match_datetime',
        'is_game_over',

    ];
    public $timestamps = true;

    public function series(){
        return $this->belongsTo(Series::class,'series_id','id');
    }
    public function team(){
        return $this->belongsTo(Team::class,'team_id','id');
    }

    public function team2(){
        return $this->belongsTo(Team::class,'team2_id','id');
    }

    public function score(){
        return $this->belongsTo(Score::class,'id','match_id');
    }

}
