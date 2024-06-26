<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class LayananWebController extends Controller
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
        $data['getLayanan'] = LayananModel::get();
        $konten = view('admin.pages.layanan', $data);
        $js = asset('controller_js/home.js');

        $put['title'] = 'Halaman Layanan';
        $put['konten'] = $konten;
        $put['js'] = $js;
        $put['user'] = $data['user'];
        return view('admin.template.main', $put);
    }

    public function tambahLayanan(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'layanan' => 'required',
                'deskripsi' => 'required',
                'id_teknisi' => 'required|exists:users,id',
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar JPEG, PNG, JPG maksimum 2MB
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 422);
            }

            // Simpan gambar dengan nama unik
            $gambar = $request->file('gambar');
            $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
            $gambar->move('file-foto/', $nama_gambar);

            // Simpan data layanan ke database
            $layanan = new LayananModel();
            $layanan->layanan = $request->layanan;
            $layanan->deskripsi = $request->deskripsi;
            $layanan->teknisi = $request->id_teknisi;
            $layanan->gambar = 'file-foto/' . $nama_gambar; // Simpan path gambar

            $layanan->save();

            return redirect()->route('layanan-web')->with('success', 'Data Layanan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data pesanan: ' . $e->getMessage());
        }
    }

    public function updateLayanan(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'id' => 'required|exists:layanan,id',
                'layanan' => 'required',
                'deskripsi' => 'required',
                'id_teknisi' => 'required|exists:users,id',
                'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi untuk gambar JPEG, PNG, JPG maksimum 2MB
            ]);

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()->first()], 422);
            }

            $layanan = LayananModel::find($request->id);
            if (!$layanan) {
                return response()->json(['error' => 'Data layanan tidak ditemukan.'], 404);
            }

            // Jika ada gambar baru, simpan dengan nama unik
            if ($request->hasFile('gambar')) {
                $gambar = $request->file('gambar');
                $nama_gambar = time() . '_' . $gambar->getClientOriginalName();
                $gambar->move('file-foto/', $nama_gambar);
                $layanan->gambar = 'file-foto/' . $nama_gambar;
            }

            $layanan->layanan = $request->layanan;
            $layanan->deskripsi = $request->deskripsi;
            $layanan->teknisi = $request->id_teknisi;

            $layanan->save();

            return redirect()->route('layanan-web')->with('success', 'Data Layanan berhasil disimpan.');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Gagal menyimpan data pesanan: ' . $e->getMessage());
        }
    }
}
