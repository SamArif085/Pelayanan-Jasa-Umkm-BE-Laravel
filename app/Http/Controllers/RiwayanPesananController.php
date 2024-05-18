<?php

namespace App\Http\Controllers;

use App\Models\PesananModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Pesanan;

class RiwayanPesananController extends Controller
{
    public function getData()
    {
        $layanan = DB::table('pesanan')
            ->select('pesanan.*', 'users.username')
            ->leftJoin('users', 'pesanan.id_teknisi', '=', 'users.id')

            ->get();

        $layanan = PesananModel::with('UserPelanggan')->get();

        return response()->json($layanan);
    }
    public function getriwayatAdmin()
    {
        $layanan = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi'])->get();
        return response()->json($layanan);
    }

    public function getriwayatTeknisi($userID)
    {
        $riwayatPesanan = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi'])
            ->where('id_teknisi', $userID)
            ->get();
        return response()->json($riwayatPesanan);
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
