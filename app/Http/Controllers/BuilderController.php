<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Builder;
use Illuminate\Http\Request;

class BuilderController extends Controller
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

        $builder = Builder::all();
        return view('builder.index', [
            "title" => "Builder",
            "builder" => $builder,
            "session" => $session
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
            'hs_name' => 'required|max:255',
            'hs_phone' => 'required',
            'hs_harga' => 'required'
        ]);

        //pembuatan id builder
        $hasil = Builder::max('hs_id');
        $id = $hasil;
        $num = (int)substr($id, 2);
        $num++;
        $char = 'HS';
        $newID = $char . sprintf("%06s", $num);

        Builder::create([
            'hs_id' => $newID,
            'hs_name' => $request->get('hs_name'),
            'hs_phone' => $request->get('hs_phone'),
            'hs_harga' => $request->get('hs_harga'),
        ]);

        return redirect('/builder')->with('success', 'Builder has ben Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $this->validate($request, [
            'hs_name' => 'required|max:255',
            'hs_phone' => 'required',
            'hs_harga' => 'required'
        ]);

        $builder = Builder::find($id);
        $builder->hs_name = $request->get('hs_name');
        $builder->hs_phone = $request->get('hs_phone');
        $builder->hs_harga = $request->get('hs_harga');
        $builder->save();

        return redirect('/builder')->with('success', 'Builder has ben Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $builder = Builder::find($id);
        $builder->delete();

        return redirect('/builder')->with('success', 'Builder has ben Deleted');
    }
}
