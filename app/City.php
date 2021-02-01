<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    protected $table = 'cities';
    protected $fillable = [
        'department_name','department_code','municipality_name','municipality_code  '
    ];
}
