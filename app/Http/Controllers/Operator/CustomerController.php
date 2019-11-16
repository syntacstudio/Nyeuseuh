<?php

namespace App\Http\Controllers\Operator;

use App\User;
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

        return view('operator.customers', compact('data'));
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

        return view('operator.customer', compact('customer'));
    }
}
