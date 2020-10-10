<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    public function products()
    {
        # code...
        return $this->hasMany(Product::class);
    }

    public function insuranceClass()
    {
        # code...
        return $this->belongsTo(InsuranceClass::class);
    }      
}
