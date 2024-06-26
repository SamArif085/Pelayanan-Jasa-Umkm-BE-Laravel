<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use App\Models\PesananModel;
use Illuminate\Support\Facades\Auth;

class RiwayatWebController extends Controller
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
            $data['pesanan'] = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->get();
        } elseif ($user->role == 2) {
            $data['pesanan'] = PesananModel::where('id_teknisi', $user->id)
                ->with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])
                ->get();
        } elseif ($user->role == 3) {
            $data['pesanan'] = PesananModel::where('id_pelanggan', $user->id)
                ->with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])
                ->get();
        }
        // dd($data);
        $konten = view('admin.pages.riwayat', $data);
        $js = asset('controller_js/home.js');

        $put['title'] = 'Halaman Riwayat';
        $put['konten'] = $konten;
        $put['js'] = $js;
        $put['user'] = $data['user'];
        return view('admin.template.main', $put);
    }

    public function cancelpesan(Request $request)
    {
        try {
            $pesanan = PesananModel::find($request->id);
            if ($pesanan) {
                $pesanan->status = 4;
                $pesanan->save();

                return response()->json(['success' => true, 'message' => 'Pesanan berhasil dibatalkan.']);
            } else {
                return response()->json(['success' => false, 'message' => 'Pesanan tidak ditemukan.']);
            }
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Gagal membatalkan pesanan: ' . $e->getMessage()]);
        }
    }
}
