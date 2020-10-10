<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;

class Tasks extends Model
{
    public function status(){
        return $this->belongsTo('App\Models\Tasks\Status');
    }
}