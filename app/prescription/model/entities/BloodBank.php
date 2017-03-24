<?php

namespace App\prescription\model\entities;

use Illuminate\Database\Eloquent\Model;

class BloodBank extends Model
{
    protected $table = 'bloodbank';



    public function user()
    {
        return $this->belongsTo('App\User', 'bloodbank_id');
    }
}
