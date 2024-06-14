<?php

namespace App\Http\Controllers;

use App\Models\LayananModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class LayananController extends Controller
{
    public function getData()
    {
        $layanan = DB::table('layanan')
            ->join('users', 'layanan.teknisi', '=', 'users.id')
            ->select('layanan.*', 'users.username')
            ->get();

        return response()->json($layanan);
    }

    public function Adddata(Request $request)
    {
        $data = $request->all();
        if (isset($data['gambar']) && $data['gambar'] != null) {
            $validator = Validator::make($request->all(), [
                'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $dokumen = $request->file('gambar');
            $nama_file = $dokumen->getClientOriginalName();
            $dokumen->move('file-foto/', $nama_file);
        }
        try {
            $layanan = new LayananModel();
            $layanan->layanan = $request->nama_layanan ?? null;
            $layanan->deskripsi = $request->deskripsi ?? null;
            $layanan->teknisi = $request->teknisi ?? null;

            if (isset($data['gambar']) && $data['gambar'] != null) {
                $layanan->gambar = 'file-foto/' . $nama_file;
            }

            $layanan->save();

            return response()->json(['message' => 'Data pesanan berhasil disimpan.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan data pesanan: ' . $e->getMessage()], 500);
        }
    }

    public function getUserTek($id)
    {
        $getUser = layananModel::findOrFail($id);
        $getUser = User::join('layanan', function ($join) use ($id) {
            $join->on('layanan.teknisi', '=', 'users.id')
                ->where('layanan.id', $id);
        })
            ->where('users.role', 2)
            ->select('users.*')
            ->get();
        return response()->json($getUser);
    }

    public function editLayanan(Request $request, $id)
    {
        $data = $request->all();

        $validator = Validator::make($data, [
            'nama_layanan' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'teknisi' => 'required|integer|exists:users,id',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        try {
            $layanan = LayananModel::findOrFail($id);
            $layanan->layanan = $request->nama_layanan;
            $layanan->deskripsi = $request->deskripsi;
            $layanan->teknisi = $request->teknisi;

            if ($request->hasFile('gambar')) {
                if ($layanan->gambar && file_exists(public_path($layanan->gambar))) {
                    unlink(public_path($layanan->gambar));
                }

                $dokumen = $request->file('gambar');
                $nama_file = time() . '_' . $dokumen->getClientOriginalName();
                $dokumen->move(public_path('file-foto'), $nama_file);
                $layanan->gambar = 'file-foto/' . $nama_file;
            }

            $layanan->save();

            return response()->json(['message' => 'Data layanan berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data layanan: ' . $e->getMessage()], 500);
        }
    }
    public function deleteLayanan($id)
    {
        try {
            $layanan = LayananModel::find($id);
            $layanan->delete();

            return response()->json(['message' => 'Data pengguna berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menghapus data pengguna: ' . $e->getMessage()], 500);
        }
    }
}
