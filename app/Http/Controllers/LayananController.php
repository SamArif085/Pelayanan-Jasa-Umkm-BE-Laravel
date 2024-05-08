<?php

namespace App\Http\Controllers;

use App\Models\LayananModel;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        try {
            $layanan = new LayananModel();
            $layanan->layanan = $request->nama_layanan ?? null;
            $layanan->deskripsi = $request->deskripsi ?? null;
            $layanan->teknisi = $request->teknisi ?? null;
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
        try {
            $layanan = layananModel::findOrFail($id);
            $layanan->layanan = $request->nama_layanan;
            $layanan->deskripsi = $request->deskripsi;
            $layanan->teknisi = $request->teknisi;

            $layanan->save();


            return response()->json(['message' => 'Data pengguna berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage()], 500);
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
