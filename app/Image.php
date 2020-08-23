<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    public function imageable(){ // Relacion 1 a muchos con polimorfismo
        return $this->morphedTo();
    }
}
