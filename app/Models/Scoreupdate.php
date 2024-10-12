<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scoreupdate extends Model
{
    use HasFactory;
    protected $fillable=['out_type','out_by_type','one','two','three','four','six'];
}
