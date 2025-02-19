<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    // metodo de muchos a uno
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
    // metodo de muchos a uno
    public function image(){
        return $this->belongsTo('App\Models\Image', 'image_id');
    }
}
