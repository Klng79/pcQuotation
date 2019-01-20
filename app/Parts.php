<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parts extends Model
{
    
    public function group()
    {
        return $this->belongsTo('App\Groups');
    }

}
