<?php

namespace App\Http\Controllers;

use App\Models\LayananModel;
use App\Models\User;
use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeknisiController extends Controller
{
    public function getData($userID)
    {
        $teknisi = PesananModel::with(['UserPelanggan','DataLayanan'])
            ->where('id_teknisi', $userID)
            ->whereIn('status', [1, 2])
            ->get();
        return response()->json($teknisi);
    }

    public function updatePesananTeknisi(Request $request, $id)
    {

        // dd($request->all());
        try {
            $pesanan = PesananModel::findOrFail($id);

            $pesanan->tgl_pesan_selesai = $request->tglServis;
            $pesanan->deskripsi = $request->deskripsi;
            $pesanan->harga_jasa = $request->jasa;
            $pesanan->harga_alat = $request->alat;
            $pesanan->status = $request->status;
            $pesanan->save();

            return response()->json(['message' => 'Data pengguna berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage()], 500);
        }
    }
}
