<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        if (is_null($user->role)) {
            return Redirect::route('web-login');
        }
        $data = [];
        $data['user'] = $user;

        if ($user->role == 1) {
            $data['pesanan'] = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->whereIn('status', [0, 1, 2])->get();
            $data['jumlahRiwayat'] = PesananModel::count();
            $data['jumlahPesanan'] = PesananModel::where('status', 0)->count();
            $data['jumlahLayanan'] = LayananModel::count();
            $data['jumlahUser'] = User::whereIn('role', [2, 3])->count();
        } elseif ($user->role == 2) {
            $data['pesanan'] = PesananModel::where('id_teknisi', $user->id)
                ->with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->whereIn('status', [1, 2])
                ->get();
            $data['jumlahRiwayat'] = PesananModel::where('id_teknisi', $user->id)->count();
            $data['jumlahPesanan'] = PesananModel::where('status', 0)->where('id_teknisi', $user->id)->count();
            $data['jumlahLayanan'] = LayananModel::count();
            $data['jumlahUser'] = User::whereIn('role', [3])->count();
        } elseif ($user->role == 3) {
            $data['pesanan'] = PesananModel::where('id_pelanggan', $user->id)
                ->with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->whereIn('status', [0, 1, 2])
                ->get();
            $data['jumlahRiwayat'] = PesananModel::where('id_pelanggan', $user->id)->count();
            $data['jumlahPesanan'] = PesananModel::where('status', 0)->where('id_pelanggan', $user->id)->count();
            $data['jumlahLayanan'] = LayananModel::count();
            $data['jumlahUser'] = User::whereIn('role', [2])->count();
        }

        $konten = view('admin.pages.dashboard', $data);
        $js = asset('controller_js/home.js');

        $put['title'] = 'Halaman Dashboard';
        $put['konten'] = $konten;
        $put['js'] = $js;
        $put['user'] = $data['user'];

        return view('admin.template.main', $put);
    }
}
