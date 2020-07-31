<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tariff extends Model
{
    //
    public function benefits()
    {
        # code...
        return $this->hasMany(Benefit::class, 'benefit_tariffs', 'tariff_id', 'benefit_id');
    }

}
