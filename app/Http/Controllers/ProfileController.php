<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
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

        return view('profile.index', [
            "title" => "Profile",
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
        //
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
            'adm_username' => 'required'
        ]);

        $admin = Admin::find($id);
        $admin->adm_name = $request->get('adm_name');
        $admin->adm_email = $request->get('adm_email');
        $admin->adm_phone = $request->get('adm_phone');
        $admin->adm_username = $request->get('adm_username');
        $admin->save();

        return redirect('/profile')->with('success', 'Data has ben Updated');
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

    public function ubahPassword(Request $request, $id)
    {
        $admin = Admin::find($id);
        if (Hash::check($request->passwordLama, $admin->adm_password)) {

            $password1 = $request->passwordBaru1;
            $password2 = $request->passwordBaru2;

            if ($password1 == $password2) {

                $password = bcrypt($password1);
                $admin->adm_password = $password;
                $admin->save();

                return redirect('/profile')->with('success', 'Password has ben Updated');
            } else {

                return back()->with('error', 'Konfirmasi password berbeda');
            }
        } else {
            return back()->with('error', 'password lama salah');
        }
    }

    public function ubahFoto(Request $request, $id)
    {

        $validateData = $this->validate($request, [
            'picture' => 'image|file|max:2048'
        ]);

        if ($request->file('image')) {
            $validateData['picture'] = $request->file('image')->store('image-profile');
        }

        $admin = Admin::find($id);
        $admin->picture = $validateData['picture'];
        $admin->save();

        return redirect('/profile')->with('success', 'Foto Profile berhasil di ubah');
    }
}
