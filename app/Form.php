<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $fillable = [
        'name',
        'surname',
        'gender',
        'user_id',
        'phone',
        'burn',
    ];
}
