<?php

namespace App\Http\Controllers\Operator;

use App\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
    /**
     * Show the application dashboard for admin.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $orders = Order::orderBy('created_at', 'DESC')
                        ->limit(10)
                        ->get();

        $unpaid     = Order::where('status', 'unpaid')->count();
        $paid       = Order::where('status', 'paid')->count();
        $completed  = Order::where('status', 'completed')->count();


        return view('operator.dashboard', [
            'orders' => $orders,
            'unpaid' => $unpaid,
            'paid' => $paid,
            'completed' => $completed
        ]);
    }
}
