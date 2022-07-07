<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
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

        $payment = Payment::all();
        return view('payment.index', [
            "title" => "Payment",
            "payment" => $payment,
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
            'pay_name' => 'required|max:255'
        ]);

        //pembuatan id payment
        $hasil = Payment::max('pay_id');
        $id = $hasil;
        $num = (int)substr($id, 3);
        $num++;
        $char = 'PYM';
        $newID = $char . sprintf("%05s", $num);

        Payment::create([
            'pay_id' => $newID,
            'pay_name' => $request->get('pay_name')
        ]);

        return redirect('/payment')->with('success', 'Payment has ben Added');
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
            'pay_name' => 'required|max:255'
        ]);

        $payment = Payment::find($id);
        $payment->pay_name = $request->get('pay_name');
        $payment->save();

        return redirect('/payment')->with('success', 'Payment has ben Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $payment = Payment::find($id);
        $payment->delete();

        return redirect('/payment')->with('success', 'Payment has ben deleted');
    }
}
