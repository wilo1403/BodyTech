<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $table = 'clients';
    protected $fillable = [
        'identification', 'identification_type', 'first_name', 'second_name', 'last_name', 'second_last_name', 'address', 'phone', 'email', 'position', 'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

}
