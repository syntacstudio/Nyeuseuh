<?php

namespace App\Http\Controllers\Admin;

use App\Price;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Price::paginate(15);

        return view('admin.price.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.price.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:prices,code',
            'name' => 'required|string|max:25',
            'price' => 'required|integer',
            'icon' => 'required|image',
        ]);

        $filetype   = $request->icon->getClientOriginalExtension();
        $icon       = date('ymdHis').'.'.$filetype;
        $request->file('icon')->storeAs('public/icons', $icon);

        Price::create([
            'code' => $request->code,
            'name' => $request->name,
            'price' => $request->price,
            'icon' => $icon,
        ]);

        return redirect()
                    ->back()
                    ->with('success', 'Price added to database.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Price::findOrFail($id);

        return view('admin.price.edit', compact('data'));
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
        $request->validate([
            'code' => 'required|string',
            'name' => 'required|string|max:25',
            'price' => 'required|integer'
        ]);

        $data = Price::findOrFail($id);
        $data->code     = $request->input('code', $data->code);
        $data->name     = $request->input('name', $data->name);
        $data->price    = $request->input('price', $data->price);

        if($request->hasFile('icon')){
            $request->validate([
                'icon' => 'required|image',
            ]);
            $filetype   = $request->icon->getClientOriginalExtension();
            $icon       = date('ymdHis').'.'.$filetype;
            $request->file('icon')->storeAs('public/icons', $icon);
            
            $data->icon = $icon;
        }

        $data->save();
        return redirect()
                    ->back()
                    ->with('success', 'Price has been updated.');
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
