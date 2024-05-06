<?php

namespace App\Http\Controllers;
use App\Models\LayananModel;
use Illuminate\Http\Request;
use Layanan;

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
        $layanan->teknisi = $request->teknisi ?? null;
        $layanan->save();
        
        return response()->json(['message' => 'Data pesanan berhasil disimpan.'], 200);
    } catch (\Exception $e) {
        return response()->json(['message' => 'Gagal menyimpan data pesanan: ' . $e->getMessage()], 500);
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
