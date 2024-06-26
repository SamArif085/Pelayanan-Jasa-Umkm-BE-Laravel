<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginWebController extends Controller
{
    public function index()
    {

        $put = [
            'title' => 'Login'
        ];
        $js = asset('controller_js/home.js');


        $put['title'] = 'Halaman Home';
        // $put['konten'] = $konten;
        $put['js'] = $js;

        return view('admin.login', $put);
    }

    public function cekLogin(Request $request)
    {
        $data = $request->all();

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        $userdata = DB::table('users as usr')
            ->select(['usr.*'])
            ->where('usr.username', '=', $data['username'])
            ->first();

        if ($userdata == null) {
            return redirect()->route('login')->with('error', 'Username tidak ditemukan');
        }

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $request->session()->put('user_id', $userdata->id);

            return redirect('dashboard')->with('success', 'Selamat datang ' . session('nama'));
        }

        return back()->withErrors([
            'username' => 'Username anda salah!!',
            'password' => 'Password anda salah!!',
        ]);
    }




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
