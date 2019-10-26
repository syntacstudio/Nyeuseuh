<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    /**
     * Set fillable mutator
     */
    protected $fillable = [
        'code', 'name', 'price', 'icon'
    ];
}
