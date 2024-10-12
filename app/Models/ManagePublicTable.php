<?php

namespace App\Models;

use App\Models\Matchh;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ManagePublicTable extends Model
{
    use HasFactory;

    protected $fillable = [
        'match_id',
        'table_number',
        'targeted_runs',
        'targeted_overs'
    ];

    // public $timestamps = true;

    // public function matchh(){
    //     return $this->belongsTo(Matchh::class);
    // }
    public function matchh(){
        return $this->belongsTo(Matchh::class,'match_id','id');
    }
}
