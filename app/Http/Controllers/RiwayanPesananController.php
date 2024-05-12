<?php

namespace App\Http\Controllers;

use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RiwayanPesananController extends Controller
{
    public function getData()
    {
        $layanan = DB::table('pesanan')
            ->select('pesanan.*', 'users.username')
            ->leftJoin('users', 'pesanan.id_teknisi', '=', 'users.id')

            ->get();

        return response()->json($layanan);
    }
    public function getriwayatAdmin()
    {
        $layanan = DB::table('pesanan')
            ->select('pesanan.*', 'users.username')
            ->leftJoin('users', 'pesanan.id_teknisi', '=', 'users.id')

            ->where('pesanan.status', '!=', 0)


            ->get();

        return response()->json($layanan);
    }
    public function getriwayatTeknisi()
    {
        $layanan = DB::table('pesanan')
            ->select('pesanan.*', 'users.username')
            ->where('pesanan.status', 3)
            ->leftJoin('users', 'pesanan.id_teknisi', '=', 'users.id')

            ->get();

        return response()->json($layanan);
    }

    public function cancelPesanan(Request $request, $id)
    {
        try {
            $cancelPelanggan = PesananModel::findOrFail($id);
            $cancelPelanggan->status = $request->status;

            $cancelPelanggan->save();

            return response()->json(['message' => 'Data pengguna berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage()], 500);
        }
    }
}
