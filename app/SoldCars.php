<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class SoldCars extends Model
{
    public $table = "soldcars";
    protected $fillable = ['id','car_id','user_id'];
    public function car(){
        return $this->hasMany('App\Car');
    }
    public function user(){
        return $this->hasMany('App\User');
    }
}
