<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MyCart extends Model
{
    use HasFactory;
    public function subindustry()
    {
        return $this->belongsTo(Subindustry::class,'subindustry_id');
    }

    public function report()
    {
        return $this->belongsTo(Report::class,'report_id');
    }
}
