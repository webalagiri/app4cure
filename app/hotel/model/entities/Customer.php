<?php

namespace App\hotel\model\entities;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';

    protected $fillable = array('customer_name', 'address', 'city', 'country',
        'pin', 'telephone', 'email', 'customer_photo', 'created_at', 'modified_at', 'created_by', 'updated_by');

    protected $guarded = array('id', 'customer_id');

    public function user()
    {
        return $this->belongsTo('App\User', 'customer_id');
    }
}
