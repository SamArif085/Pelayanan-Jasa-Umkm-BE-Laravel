<?php

namespace App\Http\Controllers;

use App\Models\PesananModel;
use Illuminate\Http\Request;

class RiwayanPesananController extends Controller
{
    public function getData($id)
    {
        $layanan = PesananModel::with('UserPelanggan', 'DataLayanan','UserTeknisi')
            ->where('id_pelanggan', $id)
            ->get();

        return response()->json($layanan);
    }
    public function getDatanotif($id)
    {
        $layanan = PesananModel::with('UserPelanggan', 'DataLayanan')
            ->where('id_pelanggan', $id)
            ->whereIn('status', [0, 1, 2])
            ->get();

        return response()->json($layanan);
    }
    public function getriwayatAdmin()
    {
        $layanan = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])->get();
        return response()->json($layanan);
    }

    public function getriwayatTeknisi($userID)
    {
        $riwayatPesanan = PesananModel::with(['UserPelanggan', 'UserAdmin', 'UserTeknisi', 'DataLayanan'])
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
