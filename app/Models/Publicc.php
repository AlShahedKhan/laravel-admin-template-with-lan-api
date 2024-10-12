<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Score;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publicc extends Model
{
    use HasFactory;

    public function matchh(){
        return $this->belongsTo(Score::class);
    }

    public function team(){
        return $this->belongsTo(Team::class,'team_id','id');
    }

    public function team2(){
        return $this->belongsTo(Team::class,'team2_id','id');
    }
}
