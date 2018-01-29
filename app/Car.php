<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'logo', 'description', 'data', 'price', 'tax',];
    public function category(){
        return $this->belongsTo('App\Category');
    }
    public function users(){
        return $this->belongsToMany('App\User');
    }
}
