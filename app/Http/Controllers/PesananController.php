<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Import DB dari namespace yang tepat
use App\Models\PesananModel;

class PesananController extends Controller
{
    public function tambahPesanan(Request $request)
    {
        // dd($request);
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

            return response()->json(['message' => 'Data pesanan berhasil disimpan.'], 200);
        } catch (\Exception $e) {
            return response()->json(['message' => 'Gagal menyimpan data pesanan: ' . $e->getMessage()], 500);
        }
    }
}
