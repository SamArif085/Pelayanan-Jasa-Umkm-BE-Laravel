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
}
