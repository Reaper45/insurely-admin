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
    
    //
    public function parent()
    {
        # code...
        return $this->belongsTo(self::class, "parent_id", "id");
    }
    
    //
    public function children()
    {
        # code...
        return $this->hasMany(self::class, "parent_id");
    }
}
