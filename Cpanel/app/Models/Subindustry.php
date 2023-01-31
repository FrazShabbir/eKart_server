<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subindustry extends Model
{
    use HasFactory;

    public function industry(){
        return $this->belongsTo(Industry::class);
    }
    public function reports(){
        return $this->hasMany(Report::class);
    }

    public function report(){
        return $this->belongsTo(Report::class,'subindustry_id');
    }
}
