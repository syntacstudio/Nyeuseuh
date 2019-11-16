<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = \Auth::user()
                    ->orders()
                    ->orderBy('created_at', 'DESC')
                    ->paginate(10);
        
        return view('customer.orders', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = \Auth::user()
                    ->orders()
                    ->where('number', $id)
                    ->first();

        return view('customer.order', compact('order'));
    }
}
