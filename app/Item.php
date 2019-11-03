<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = [
        'order_id', 'name', 'price', 'quantity', 'total'
    ];
}
