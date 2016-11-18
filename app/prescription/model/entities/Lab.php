<?php

namespace App\prescription\model\entities;

use Illuminate\Database\Eloquent\Model;

class Lab extends Model
{
    protected $table = 'laboratory';



    public function user()
    {
        return $this->belongsTo('App\User', 'laboratory_id');
    }
}
