<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Charge extends Model
{
    //
    public function benefits()
    {
        # code...
        return $this->belongsToMany(Benefit::class, 'benefit_charges', 'charge_id', 'charge_id');
    }
}
