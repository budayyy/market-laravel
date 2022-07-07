<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function proses(Request $request)
    {
        $this->validate($request, [
            'adm_username' => 'required',
            'adm_password' => 'required'
        ]);

        $username = $request->input('adm_username');
        $password = $request->input('adm_password');

        $users = DB::table('administrator')
            ->select('adm_username', 'adm_password', 'adm_id')
            ->where('adm_username', '=', $username)->first();
        $jml_users = DB::table('administrator')
            ->select('adm_username', 'adm_password', 'adm_id')
            ->where('adm_username', '=', $username)->count();

        if ($jml_users == 0) {
            return back()->with('loginerror', 'Login failed!');
        } else if ($users->adm_username == $username and Hash::check($password, $users->adm_password)) {

            $request->session()->put('login', $users->adm_id);

            return redirect('/dashboard')->with('success', 'selamat anda berhasil login kedalam sistem');
        } else {
            return back()->with('loginerror', 'Login failed!');
        }
    }

    public function logout(Request $request)
    {
        $request->session()->forget('login');

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/')->with('success', 'Anda berhasil logout');
    }

    public function forgot()
    {
        return view('forgot-password');
    }

    public function confirmEmail(Request $request)
    {
        $email = $request->email;

        // cek 
        $users = DB::table('administrator')->where('adm_email', '=', $email)->count();

        if ($users > 0) {
            $admin = DB::table('administrator')->where('adm_email', '=', $email)->first();

            $noHP =  $admin->adm_phone;
            $jmlSensor = 8;
            $afterVal  = 3;

            // untuk mengambil 4 digit angka ditengah yang disensor
            $sensor = substr($noHP, $afterVal, $jmlSensor);

            // untuk memecah bagian/kelompok angka pertama dan terakhir
            $noHP2 = explode($sensor, $noHP);

            //untuk menggabungkan angka pertama dan terakhir dengan angka tengah yang disensor
            $newPhone = $noHP2[0] . "xxxxxxxx" . $noHP2[1];

            //menampilkan hasil data yang disensor
            $newPhone;

            return view('confirm-hp', [
                "nohp" => $newPhone
            ]);
        } else {
            return back()->with('loginerror', 'Email tidak terdaftar!');
        }
    }

    public function confirmHP(Request $request)
    {
        $nohp = $request->number;

        //cek
        $jml = DB::table('administrator')->where('adm_phone', '=', $nohp)->count();

        if ($jml > 0) {

            $id = DB::table('administrator')->where('adm_phone', '=', $nohp)->first();
            return view('reset-password', [
                'admin_id' => $id->adm_id
            ]);
        } else {
            return redirect('/')->with('loginerror', 'No hp yang anda masukan salahh!');
        }
    }

    public function confirmPassword(Request $request)
    {

        if ($request->password1 == $request->password2) {

            $password = bcrypt($request->password1);
            $admin = Admin::find($request->adm_id);
            $admin->adm_password = $password;
            $admin->save();

            return redirect('/')->with('success', 'Password telah di reset');
        } else {
            return redirect('/forgot-password')->with('loginerror', 'password berbeda');
        }
    }
}
