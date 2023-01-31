<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Industry extends Model
{
    use HasFactory;

    public function subindustries(){
        return $this->hasMany(Subindustry::class);
    }
    public function articles(){
        return $this->hasMany(Article::class);
    }
}
