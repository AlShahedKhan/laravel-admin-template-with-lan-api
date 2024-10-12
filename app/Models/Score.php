<?php

namespace App\Models;

use App\Models\Team;
use App\Models\Matchh;
use App\Models\Player;
use App\Models\Series;
use App\Models\Scoreupdate;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Score extends Model
{
    use HasFactory;

    protected $fillable = [
        'series_id',
        'team_id',
        'match_id',
        'player_id',
        'scoreupdate_id',
        'outby_id',
        'out_type',
        'one_id',
        'two_id',
        'three_id',
        'four_id',
        'six_id',
        'balls_played_id'
    ];

    public function series()
    {
        return $this->belongsTo(Series::class, 'series_id');
    }
    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function matchh()
    {
        return $this->belongsTo(Matchh::class, 'match_id');
    }
    public function player()
    {
        return $this->belongsTo(Player::class, 'player_id');
    }

    public function scoreupdate()
    {
        return $this->belongsTo(Scoreupdate::class, 'scoreupdate_id');
    }
    public function scoreupdateoutbytype()
    {
        return $this->belongsTo(Scoreupdate::class, 'outby_id');
    }
    public function scoreupdateone()
    {
        return $this->belongsTo(Scoreupdate::class, 'one_id');
    }
    public function scoreupdatetwo()
    {
        return $this->belongsTo(Scoreupdate::class, 'two_id');
    }
    public function scoreupdatethree()
    {
        return $this->belongsTo(Scoreupdate::class, 'three_id');
    }
    public function scoreupdatefour()
    {
        return $this->belongsTo(Scoreupdate::class, 'four_id');
    }
    public function scoreupdatesix()
    {
        return $this->belongsTo(Scoreupdate::class, 'six_id');
    }
    public function scoreupdateballsplayed()
    {
        return $this->belongsTo(Scoreupdate::class, 'balls_played_id');
    }
}
