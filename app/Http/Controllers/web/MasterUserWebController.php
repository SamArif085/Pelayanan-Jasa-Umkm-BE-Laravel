<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class MasterUserWebController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (is_null($user->role)) {
            return Redirect::route('web-login');
        }
        $data = [];
        $data['user'] = $user;
        $data['getTeknisi'] = User::where('role', 2)->get();
        $konten = view('admin.pages.masterUser', $data);
        $js = asset('controller_js/home.js');

        $put['title'] = 'Halaman ADD Teknisi';
        $put['konten'] = $konten;
        $put['js'] = $js;
        $put['user'] = $data['user'];
        return view('admin.template.main', $put);
    }

    public function tambahUser(Request $request)
    {
        try {
            $user = new User();
            $user->name = 'Teknisi';
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->no_telp = $request->no_telp;
            $user->role = '2';
            $user->save();

            return redirect()->route('master-user-web')->with('success', 'Data Layanan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data pesanan: ' . $e->getMessage());
        }
    }

    public function updateUser(Request $request)
    {
        try {
            $user = User::find($request->id);
            $user->username = $request->username;
            $user->no_telp = $request->no_telp;
            if (!empty($request->password)) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect()->route('master-user-web')->with('success', 'Data user berhasil diupdate.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data user: ' . $e->getMessage());
        }
    }
}
