<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * set mutator fillable
     */
    protected $fillable = [
        'user_id', 'number', 'total', 'estimate', 'pickup', 'address'
    ];

    protected $dates = [ 'estimate' ];

    /**
     * Generate order number
     */
    public static function generateNumber()
    {
        return 'INV'.date('ymdHis');
    }

    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function items()
    {
        return $this->hasMany('App\Item');
    }
}
