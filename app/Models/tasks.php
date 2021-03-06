<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class tasks extends Model
{
    public $guarded = [];

    public function taskable()
    {
        return $this->morphTo();
    }

    public function status(){
        return $this->belongsTo('App\Models\statuses', 'status_id', 'id');
    }

    public function assignedTo(){
        return $this->belongsTo('App\User', 'assigned_to', 'id');
    }


}
