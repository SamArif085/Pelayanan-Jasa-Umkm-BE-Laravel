<?php

namespace App\Http\Controllers;

use App\Models\LayananModel;
use App\Models\User;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeknisiController extends Controller
{
    public function getData()
    {
        $teknisi = PesananModel::whereIn('status', [1, 2])
            ->join('users', 'pesanan.id_pelanggan', '=', 'users.id')
            ->where('users.role', 3)
            ->select('pesanan.*', 'users.username')

            ->get();

        return response()->json($teknisi);
    }

    public function updatePesananTeknisi(Request $request, $id)
    {
        try {
            $teknisi = PesananModel::findOrFail($id);
            $teknisi->harga_alat = $request->alat;
            $teknisi->harga_jasa = $request->jasa;
            $teknisi->tgl_pesan_selesai = $request->tglServis;
            $teknisi->status = $request->status;
            $teknisi->deskripsi = $request->deskripsi;

            $teknisi->save();

            return response()->json(['message' => 'Data pengguna berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage()], 500);
        }
    }
}
