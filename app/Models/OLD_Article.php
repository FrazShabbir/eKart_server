<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    public function service()
    {
         return $this->belongsTo(Service::class);
    }

    public function industry()
    {
         return $this->belongsTo(Industry::class);
    }


    public function region()
    {
         return $this->belongsTo(Region::class);
    }


    public function country()
    {
         return $this->belongsTo(Country::class);
    }
}
