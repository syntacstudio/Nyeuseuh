<?php

namespace App\Http\Controllers\Admin;

use App\Role;
use App\User;
use App\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = User::whereHas('roles', function($query){
                        $query->where('name', 'customer');
                    })->paginate(10);
        
        return view('admin.customers', compact('data'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = User::find($id);

        return view('admin.customer', compact('customer'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user   = User::findOrFail($id);
        $orders = Order::where('user_id', $id)->delete();
        $user->delete();

        return redirect()
                    ->route('admin.customers')
                    ->with('success', 'Customer account has been deleted.');
    }
}
