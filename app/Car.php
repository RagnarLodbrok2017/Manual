<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    protected $fillable = ['name', 'logo', 'description', 'data', 'price', 'tax',];
}
