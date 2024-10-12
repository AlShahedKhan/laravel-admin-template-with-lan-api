<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Matchh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Curve extends Model
{
    use HasFactory;
    protected $fillable = ['team_id','match_id','runs'];

    public function team(){
        return $this->belongsTo(Team::class,'team_id');
    }
    public function matchh(){
        return $this->belongsTo(Matchh::class,'match_id');
    }
}
