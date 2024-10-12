<?php

namespace App\Models;

use App\Models\Team;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Series extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_name',
        'team_id',
        'venue',
        'series_start_time',
        'series_end_time',
    ];

    public function series(){
        return $this->belongsTo(Matchh::class,'series_id','id');
    }
    public function team(){
        return $this->belongsTo(Team::class,'team_id','id');
    }

    protected $casts = [
        'serie_start_time' => 'datetime',
        'serie_end_time' => 'datetime',
    ];
}
