<?php

namespace App\Http\Controllers;
use App\Models\LayananModel;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function getData()
    {
        $layanan = LayananModel::all();
        return response()->json($layanan);
    }
    public function Adddata(Request $request)
    {
        try {
        $layanan = new LayananModel();
        $layanan->layanan = $request->nama_layanan ?? null;
        $layanan->deskripsi = $request->deskripsi ?? null;
        $layanan->teknisi = $request->nama_teknisi ?? null;
        $layanan->save();
        
        return response()->json(['message' => 'Data pesanan berhasil disimpan.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menyimpan data pesanan: ' . $e->getMessage()], 500);
    }
       
    }
}
