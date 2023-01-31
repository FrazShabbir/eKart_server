<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    use HasFactory;


    public function report()
    {
        return $this->belongsTo(Report::class,'report_id');
    }

    public function subIndustry()
    {
        return $this->belongsTo(Subindustry::class,'subindustry_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }



}
