<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public function overview(){
        return $this->hasOne(Overview::class, 'report_id');
    }

    public function contents(){
        return $this->hasMany(Content::class, 'report_id');
    }

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
    public function manager(){
        return $this->belongsTo(User::class);
    }
    public function employee(){
        return $this->belongsTo(User::class);
    }


    public function orderDetails(){
        return $this->hasMany(OrderDetail::class,'subindustry_id');
    }

    public function issues(){
        return $this->hasMany(ReportIssue::class);
    }



}
