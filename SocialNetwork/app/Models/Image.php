<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    // le indicamos que la tabla se llama images
    protected $table = 'images';
    //metodo para la relacion de uno a muchos
    public function comments(){
        return $this->hasMany('App\Models\Comment')->orderBy('id', 'desc');
    }
    //metodo para la relacion de uno a muchos
    public function likes(){
        return $this->hasMany('App\Models\Like');
    }
    //metodo para la relacion de muchos a uno
    public function user(){
        return $this->belongsTo('App\Models\User', 'user_id');
    }
}
