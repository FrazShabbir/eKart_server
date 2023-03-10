<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ArticleCategory extends Model implements HasMedia

{
    use HasFactory ,InteractsWithMedia;

    public function articles()
    {
        return $this->hasMany(Article::class,'category_id');
    }
}
