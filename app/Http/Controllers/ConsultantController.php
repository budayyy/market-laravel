<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Consultant;
use Illuminate\Http\Request;

class ConsultantController extends Controller
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

        $consultant = Consultant::all();
        return view('consultant.index', [
            "title" => "Consultant",
            "consultant" => $consultant,
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
            'ac_name' => 'required|max:255',
            'ac_email' => 'required',
            'ac_phone' => 'required',
            'name_pt' => 'required',
            'ac_payment' => 'required'
        ]);

        //pembuatan id consultant
        $hasil = Consultant::max('ac_id');
        $id = $hasil;
        $num = (int)substr($id, 3);
        $num++;
        $char = 'ARC';
        $newID = $char . sprintf("%09s", $num);

        Consultant::create([
            'ac_id' => $newID,
            'ac_name' => $request->get('ac_name'),
            'ac_email' => $request->get('ac_email'),
            'ac_phone' => $request->get('ac_phone'),
            'name_pt' => $request->get('name_pt'),
            'ac_payment' => $request->get('ac_payment')
        ]);

        return redirect('/consultant')->with('success', 'Consultant has ben Added');
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
            'ac_name' => 'required|max:255',
            'ac_email' => 'required',
            'ac_phone' => 'required',
            'name_pt'  => 'required',
            'ac_payment' => 'required'
        ]);

        $consultant = Consultant::find($id);
        $consultant->ac_name = $request->get('ac_name');
        $consultant->ac_email = $request->get('ac_email');
        $consultant->ac_phone = $request->get('ac_phone');
        $consultant->name_pt = $request->get('name_pt');
        $consultant->ac_payment = $request->get('ac_payment');
        $consultant->save();

        return redirect('/consultant')->with('success', 'Consultant has ben Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $consultant = Consultant::find($id);
        $consultant->delete();

        return redirect('/consultant')->with('success', 'Consultant has ben deleted!');
    }
}
