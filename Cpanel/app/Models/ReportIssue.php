<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportIssue extends Model
{
    use HasFactory;
    public function report(){
        return $this->belongsTo(Report::class);
    }

    public function answer_user(){
        return $this->belongsTo(User::class,'resolve_by');
    }
    public function question_user(){
        return $this->belongsTo(User::class,'create_by');
    }
}
