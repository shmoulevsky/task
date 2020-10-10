<?php

namespace App\Models\Tasks;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    protected $table = 'status';
    
    public function tasks(){
        return $this->hasMany('App\Models\Tasks\Tasks', 'status_id', 'id');
    } 
}