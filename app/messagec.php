<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class messagec extends Model
{
     protected $guarded = [];

    public function email(){
        return $this->belongsTo(Message::class);
    }
}
