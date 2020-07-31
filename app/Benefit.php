<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    //
    public function tariffs()
    {
        # code...
        return $this->belongsToMany(Tariff::class, 'benefit_tariffs', 'benefit_id', 'tariff_id');
    }

    public function charges()
    {
        # code...
        return $this->belongsToMany(Charge::class, 'benefit_charges', 'benefit_id', 'charge_id');
    }
}
