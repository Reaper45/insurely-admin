<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * 
     */
    public function tariffs()
    {
        # code...
        return $this->hasMany(Tariff::class, 'product_tariffs');
    }

    /**
     * 
     */
    public function charges()
    {
        # code...
        return $this->hasMany(Charge::class, 'product_charges');
        
    }

    /**
     * 
     */
    public function benefits()
    {
        # code...
        return $this->hasMany(Benefit::class, 'product_benefits' , 'product_id', 'benefit_id');
    }

    /**
     * 
     */
    public function insurer()
    {
        # code...
        return $this->belongsTo(Insurer::class);
    }

    /**
     * 
     */
    public function category()
    {
        # code...
        return $this->hasOne(Category::class);
    }

    /**
     * 
     */
    public function insuranceClass()
    {
        # code...
        return $this->hasOne(InsuranceClass::class);
    }       
}
