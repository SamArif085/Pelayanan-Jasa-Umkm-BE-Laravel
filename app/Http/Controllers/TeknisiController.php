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
        $teknisi = PesananModel::all();
        return response()->json($teknisi);
    }

    public function editpesananTeknisi(Request $request, $id)
    {
        try {
            $teknisi = PesananModel ::findOrFail($id);
            // $teknisi->layanan = $request->layanan;
            // $teknisi->masalah = $request->masalah;
            // $teknisi->id_pelanggan = $request->namapelanggan;
            // $teknisi->id_admin=$request->namaadmin;
          
            $teknisi->harga_jasa = $request->jasa;
            $teknisi->harga_alat = $request->alat;
            $teknisi->status = $request->status;

            $teknisi->save();
         

            return response()->json(['message' => 'Data pengguna berhasil diperbarui.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal memperbarui data pengguna: ' . $e->getMessage()], 500);
        }
    }

}
