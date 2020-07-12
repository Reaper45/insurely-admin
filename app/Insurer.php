<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Insurer extends Model
{
    //
    public function products()
    {
        # code...
        return $this->hasMany(Product::class);
    }
}
