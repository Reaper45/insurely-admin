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
        return $this->belongsToMany(Tariff::class, 'product_tariffs' , 'product_id', 'tariff_id');
    }

    /**
     * 
     */
    public function charges()
    {
        # code...
        return $this->belongsToMany(Charge::class, 'product_charges', 'product_id', 'charge_id');
        
    }

    /**
     * 
     */
    public function benefits()
    {
        # code...
        return $this->belongsToMany(Benefit::class, 'product_benefits' , 'product_id', 'benefit_id');
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
        return $this->belongsTo(Category::class);
    }

    /**
     * 
     */
    public function insuranceClass()
    {
        # code...
        return $this->belongsTo(InsuranceClass::class);
    }       
}
