<?php

namespace App\Models;

use App\Models\Player;
use App\Models\Ranking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'team_name',
        'team_slug',
        't_20_ranking',
        'odi_ranking',
        'test_ranking',
        'w_t_20_ranking',
        'w_odi_ranking',
        'w_test_ranking',
    ];

    public function players()
    {
        return $this->hasMany(Player::class);
    }

    public function rankings()
    {
        return $this->hasMany(Ranking::class);
    }
}
