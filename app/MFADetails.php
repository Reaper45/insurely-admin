<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MFADetails extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'user_mfa_details';

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
