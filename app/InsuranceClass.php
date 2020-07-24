<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InsuranceClass extends Model
{
    //
    public function products()
    {
        # code...
        return $this->hasMany(Product::class);
    }

    //
    public function categories()
    {
        # code...
        return $this->hasMany(Category::class);
    }
}
