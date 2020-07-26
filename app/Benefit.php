<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Benefit extends Model
{
    //
    public function tariffs()
    {
        # code...
        return $this->hasMany(Tariff::class, 'benefit_tariffs', 'benefit_id', 'tariff_id');
    }

    public function charges()
    {
        # code...
        return $this->hasMany(Charge::class, 'benefit_charges', 'benefit_id', 'charge_id');
    }
}
