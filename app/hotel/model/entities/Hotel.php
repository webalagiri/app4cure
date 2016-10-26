<?php

namespace App\hotel\model\entities;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotel';

    protected $fillable = array('hotel_name', 'address', 'city', 'country',
        'pin', 'telephone', 'email', 'website',
        'hotel_logo', 'hotel_photo', 'created_at', 'modified_at', 'created_by', 'updated_by');

    protected $guarded = array('id', 'hotel_id');

    public function user()
    {
        return $this->belongsTo('App\User', 'hotel_id');
    }
}
