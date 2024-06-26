<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Login'
        ];
        $konten = view('admin.login', $data);
        $js = asset('controller_js/home.js');


        $put['title'] = 'Halaman Home';
        $put['konten'] = $konten;
        $put['js'] = $js;


        return view('admin.template.main', $put);
    }

    public function cekLogin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();
            return response()->json(['data' => $user]);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/');
    }
}
