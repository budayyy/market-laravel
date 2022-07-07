<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $shipping = Shipping::all();
        return view('shipping.index', [
            "title" => "Shipping",
            "shipping" => $shipping,
            "session"  => $session

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'shp_name' => 'required|max:255'
        ]);

        //pembuatan id shipping
        $hasil = Shipping::max('shp_id');
        $id = $hasil;
        $num = (int)substr($id, 3);
        $num++;
        $char = 'SHP';
        $newID = $char . sprintf("%04s", $num);

        Shipping::create([
            'shp_id' => $newID,
            'shp_name' => $request->get('shp_name')
        ]);

        return redirect('/shipping')->with('success', 'Shipping has ben Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function show(Shipping $shipping)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'shp_name' => 'required|max:255'
        ]);

        $shipping = Shipping::find($id);
        $shipping->shp_name = $request->get('shp_name');
        $shipping->save();

        return redirect('/shipping')->with('success', 'Shipping has ben Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Shipping  $shipping
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipping = Shipping::find($id);
        $shipping->delete();

        return redirect('/shipping')->with('success', 'Shipping has ben Deleted');
    }
}
