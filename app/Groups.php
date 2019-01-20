<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    //
    public function parts(){
        //return $this->belongsTo('App\Parts');
        //return $this->hasMany('App\Parts', 'group_id');                
            // return $this->belongsToMany('App\Role', 'role_user_table', 'user_id', 'role_id');
            
            // public function comments()
            // {
            //     return $this->hasManyThrough('App\Comment', App\Post);
            // }
            // public function comments()
            // {
            //     return $this->hasMany('App\Comment', 'foreign_key', 'local_key');
            // }
        
    }
}
