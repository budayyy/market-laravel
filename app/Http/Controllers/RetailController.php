<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Retail;
use Illuminate\Http\Request;

class RetailController extends Controller
{
    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $retail = Retail::join('member', 'mb_id', '=', 'rtl_mb_id')
            ->join('city', 'cty_id', '=', 'rtl_city')->get();
        return view('retail.index', [
            "title" => "Retail",
            "retail" => $retail,
            "session" => $session
        ]);
    }

    public function aktif(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $retail = Retail::join('member', 'mb_id', '=', 'rtl_mb_id')
            ->join('city', 'cty_id', '=', 'rtl_city')
            ->where('rtl_status', '=', 'Validate')
            ->orWhere('rtl_status', '=', 'Nonactive')
            ->get();
        return view('retail.aktif', [
            "title" => "Retail",
            "retail" => $retail,
            "session" => $session
        ]);
    }

    public function reject(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $retail = Retail::join('member', 'mb_id', '=', 'rtl_mb_id')
            ->join('city', 'cty_id', '=', 'rtl_city')
            ->where('rtl_status', '=', 'Rejected')
            ->get();
        return view('retail.reject', [
            "title" => "Retail",
            "retail" => $retail,
            "session" => $session
        ]);
    }

    public function review(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $retail = Retail::join('member', 'mb_id', '=', 'rtl_mb_id')
            ->join('city', 'cty_id', '=', 'rtl_city')
            ->where('rtl_status', '=', 'Review')
            ->get();
        return view('retail.review', [
            "title" => "Retail",
            "retail" => $retail,
            "session" => $session
        ]);
    }

    public function hapus($id)
    {
        $retail = Retail::find($id);
        $retail->delete();

        return redirect('/retail')->with('success', 'Retail has ben deleted');
    }

    public function validasi(Request $request, $id)
    {
        $retail = Retail::find($id);
        $retail->update([
            'rtl_status' => $request->get('rtl_status')
        ]);

        return redirect('/retail')->with('success', 'Retail has ben validasi');
    }

    public function detail(Request $request, $id)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        $retail = Retail::join('member', 'mb_id', '=', 'rtl_mb_id')
            ->join('city', 'cty_id', '=', 'rtl_city')
            ->where('retail.rtl_id', '=', $id)
            ->first();
        return view('retail.detail', [
            "title" => "Retail",
            "retail" => $retail,
            "session" => $session
        ]);
    }
}
