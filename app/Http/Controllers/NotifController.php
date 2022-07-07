<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class NotifController extends Controller
{
    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        return view('notification.index', [
            "title" => "notification",
            "session" => $session
        ]);
    }
}
