<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "category";
    public function cars()
    {
        return $this->hasMany('App\Car');
    }
}
