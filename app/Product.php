<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public function benefits()
    {
        # code...
        return $this->hasMany(Benefit::class, 'product_benefits' , 'product_id', 'benefit_id');
    }
}
