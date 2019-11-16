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

    /**
     * Relation with user
     * @return App\User
     */
    public function customer()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Relation with item
     * @return App\Item
     */
    public function items()
    {
        return $this->hasMany('App\Item');
    }

    /**
     * Show detail order by number
     * @param string $number
     * @return App\Order
     */
    public static function number($number)
    {
        return self::where('number', $number)->first();
    }
}
