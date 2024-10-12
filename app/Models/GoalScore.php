<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GoalScore extends Model
{
    use HasFactory;

    protected $fillable = [
        'goal', 'shots', 'shots_on_target', 'prossession', 'passes', 'passes_accuracy',
        'fouls', 'yellow_cards', 'red_cards', 'off_sides', 'corners'
    ];
}
