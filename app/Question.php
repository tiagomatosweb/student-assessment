<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public $timestamps = false;
    
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
