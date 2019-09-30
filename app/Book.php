<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    return $this->belongsToMany('App\Category');
}
