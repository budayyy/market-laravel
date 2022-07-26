<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
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

        $users = Admin::join('user_role', 'role_id', '=', 'id')
            ->where('role_id', '!=', 1)->get();
        $role = DB::table('user_role')->where('id', '!=', 1)->get();
        return view('users.index', [
            "title" => "Users",
            "users" => $users,
            "role" => $role,
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
            'adm_name' => 'required|max:255',
            'adm_email' => 'required',
            'adm_phone' => 'required',
            'adm_username' => 'required',
            'password1' => 'required|min:5',
            'role_id' => 'required'
        ]);

        //pembuatan id users admin
        $hasil = Admin::max('adm_id');
        $id = $hasil;
        $num = (int)substr($id, 2);
        $num++;
        $char = 'AD';
        $newID = $char . sprintf("%09s", $num);

        $password = bcrypt($request->get('password1'));

        Admin::create([
            "adm_id" => $newID,
            "adm_name" => $request->get('adm_name'),
            "adm_email" => $request->get('adm_email'),
            "adm_phone" => $request->get('adm_phone'),
            "adm_username" => $request->get('adm_username'),
            "picture"      => 'image-profile/profile.png',
            "adm_password" => $password,
            "role_id" => $request->get('role_id')
        ]);

        return redirect('/users')->with('success', 'Users has ben Added');
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
            'adm_name' => 'required|max:255',
            'adm_email' => 'required',
            'adm_phone' => 'required',
            'adm_username' => 'required',
            'role_id' => 'required'
        ]);

        $admin = Admin::find($id);
        $admin->adm_name = $request->get('adm_name');
        $admin->adm_email = $request->get('adm_email');
        $admin->adm_phone = $request->get('adm_phone');
        $admin->adm_username = $request->get('adm_username');
        $admin->role_id = $request->get('role_id');
        $admin->save();

        return redirect('/users')->with('success', 'Users has ben Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::find($id);
        $admin->delete();

        return redirect('/users')->with('success', 'Users has ben Deleted');
    }
}
