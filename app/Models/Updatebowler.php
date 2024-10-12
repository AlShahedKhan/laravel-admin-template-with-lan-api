<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Updatebowler extends Model
{
    use HasFactory;
    protected $fillable = ['overs','strick','maidens','runs','wickets','no_balls','wides','panalty_runs'];
}
