<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index(Request $request)
    {
        // session
        $nama     = $request->session()->get('login');
        $session  = Admin::where('adm_id', '=', $nama)->first();

        return view('chat.index', [
            "title" => "Chat",
            "session" => $session
        ]);
    }
}
