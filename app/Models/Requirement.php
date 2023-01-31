<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requirement extends Model
{
    use HasFactory;
    public function project(){
        return $this->belongsTo(Project::class);
    }
    public function service(){
        return $this->belongsTo(Service::class);
    }
    public function industry(){
        return $this->belongsTo(Industry::class);
    }
    public function subIndustry(){
        return $this->belongsTo(Subindustry::class,'subindustry_id');
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function country(){
        return $this->belongsTo(Country::class);
    }
    public function applied(){
        return $this->hasMany(ApplyRequirement::class);
    }
}
