<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
     use HasFactory ,InteractsWithMedia;
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

    public function category()
    {
         return $this->belongsTo(ArticleCategory::class);
    }
}
