<?php

namespace App\Http\Controllers\Admin;

use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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


        return view('admin.dashboard', [
            'orders' => $orders,
            'unpaid' => $unpaid,
            'paid' => $paid,
            'completed' => $completed
        ]);
    }
}
