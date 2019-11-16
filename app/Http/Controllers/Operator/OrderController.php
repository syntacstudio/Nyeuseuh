<?php

namespace App\Http\Controllers\Operator;

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
        
        return view('operator.orders', compact('orders'));
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $number
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

        return view('operator.order', compact('order', 'shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->input('status', $order->status);
        $order->save();

        return redirect()
                    ->back()
                    ->with('success', 'Order status successfully changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
