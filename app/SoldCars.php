<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SoldCars extends Model
{
    public $table = "soldcars";
    protected $fillable = ['id','car_id','user_id'];
}
