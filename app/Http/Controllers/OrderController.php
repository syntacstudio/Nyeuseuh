<?php

namespace App\Http\Controllers;

use App\Price;
use App\Order;
use App\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Price::get();

        return view('pages.order', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation= Validator::make($request->all(), [
            'address'   => 'required_with:pickup'
        ]);

        if ($validation->fails()) {
            $response = [ 'status' => 'error', 'errors' => $validation->errors() ];            
        } else {
            if(array_sum($request->item) < 1){
                $response = [
                    'status' => 'error',
                    'errors' => [ 'item' => ['Please order at least one product to checkout.']]
                ]; 
            } else {
                $order = Order::create([
                    'user_id' => \Auth::user()->id,
                    'number' => Order::generateNumber(),
                    'total' => $request->total,
                    'estimate' => Carbon::now()->addHours(4),
                    'pickup' => ($request->pickup) ? true : false,
                    'address' => $request->address
                ]);

                $items = [];
                foreach ($request->item as $id => $qty) {
                    if($qty > 0) {
                        $product = Price::find($id);
                    
                        Item::create([
                            'order_id' => $order->id,
                            'name' => $product->name,
                            'price' => $product->price,
                            'quantity' => (int)$qty,
                            'total' => ($product->price * $qty) + 10000
                        ]);
                    }
                }

                $response = [
                    'status' => 'success',
                    'msg' => 'Your order has been received',
                    'order' => $order
                ];
            }
        }

        return $response;
    }

    /**
     * Display the invoice page.
     *
     * @param  string  $number
     * @return \Illuminate\Http\Response
     */
    public function invoice($number)
    {
        $order = \Auth::user()->orders()->where('number', $number)->first();

        return view('pages.invoice', compact('order'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
