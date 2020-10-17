<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class NurseHistory extends Model
{
    public function patient(){
        return $this->belongsTo(Patient::class,'patient_id','id');
    }
}
