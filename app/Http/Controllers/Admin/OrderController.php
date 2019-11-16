<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query  = Order::query();

        $query->when($request->filled('s'), function ($q) use($request) {
            return $q->where('number', 'LIKE', '%'.$request->s.'%');
        });

        $query->when($request->filled('status'), function ($q) use($request) {
            return $q->where('status', '=', $request->status);
        });
        $orders = $query->orderBy('created_at', 'DESC')->paginate(20);
        
        return view('admin.orders', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($number)
    {
        $order = Order::number($number);

        if($order->pickup){
            $shipping = 10000;
        } else {
            $shipping = 0;
        }

        return view('admin.order', compact('order', 'shipping'));
    }
}
