<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApplyRequirement extends Model
{
    use HasFactory;
    public function requirement(){
        return $this->belongsTo(Requirement::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
