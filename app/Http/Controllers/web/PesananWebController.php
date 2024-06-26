<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use App\Models\PesananModel;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class PesananWebController extends Controller
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
            $data['pesanan'] = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->where('status', [0])->get();
        } elseif ($user->role == 2) {
            $data['pesanan'] = PesananModel::where('id_teknisi', $user->id)
                ->with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->whereIn('status', [1, 2])
                ->get();
        }
        $data['getTeknisi'] = User::where('role', 2)->get();
        $data['getElektronik'] = LayananModel::get();
        $konten = view('admin.pages.pesanan', $data);
        $js = asset('controller_js/home.js');

        $put['title'] = 'Halaman Pesanan';
        $put['konten'] = $konten;
        $put['js'] = $js;
        $put['user'] = $data['user'];
        return view('admin.template.main', $put);
    }

    public function tambahPesananuser(Request $request)
    {
        try {
            $pesanan = new PesananModel();
            $pesanan->layanan = $request->layanan ?? null;
            $pesanan->masalah = $request->masalah ?? null;
            $pesanan->alamat = $request->alamat ?? null;
            $pesanan->id_pelanggan = $request->id_pelanggan ?? null;
            $pesanan->id_admin = $request->id_admin ?? null;
            $pesanan->id_teknisi = $request->teknisi ?? null;
            $pesanan->harga_jasa = $request->harga_jasa ?? null;
            $pesanan->harga_alat = $request->harga_alat ?? null;
            $pesanan->tgl_pesan_awal = $request->tgl_pesan ?? null;
            $pesanan->tgl_pesan_selesai = $request->tgl_pesan_selesai ?? null;
            $pesanan->deskripsi = $request->deskripsi ?? null;
            $pesanan->save();

            // Redirect ke halaman dashboard
            return redirect()->route('dashboard')->with('success', 'Data pesanan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data pesanan: ' . $e->getMessage());
        }
    }

    public function ProsesPesananTeknisi(Request $request, $id)
    {
        try {
            $pesanan = PesananModel::findOrFail($id);
            $pesanan->status = $request->status;
            $pesanan->tgl_pesan_selesai = $request->tgl_pesan_selesai;
            $pesanan->deskripsi = $request->deskripsi;
            $pesanan->harga_jasa = $request->harga_jasa;
            $pesanan->harga_alat = $request->harga_alat;
            $pesanan->save();

            return redirect()->route('pesanan-web')->with('success', 'Data pesanan diproses.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui data pesanan: ' . $e->getMessage());
        }
    }
    public function ProsesPesananAdmin(Request $request, $id)
    {
        try {
            $pesanan = PesananModel::findOrFail($id);
            $pesanan->id_admin = $request->id_admin;
            $pesanan->id_teknisi = $request->id_teknisi;
            $pesanan->status = $request->status;
            $pesanan->save();

            return redirect()->route('pesanan-web')->with('success', 'Data pesanan diproses.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal memperbarui data pesanan: ' . $e->getMessage());
        }
    }
}
