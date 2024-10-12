<?php

namespace App\Models;

use App\Models\FootballTeam;
use App\Models\FootballMatch;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class League extends Model
{
    use HasFactory;
    protected $fillable = [
        'league_name',
        'venue',
        'league_start_time',
        'league_end_time',
    ];

    public function leagues(){
        return $this->belongsTo(FootballMatch::class,'league_id','id');
    }

    protected $casts = [
        'league_start_time' => 'datetime',
        'league_end_time' => 'datetime',
    ];
}
