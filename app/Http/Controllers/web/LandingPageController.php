<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\LayananModel;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function Home()
    {
        $data = [];
        $data['namaElektronik'] = LayananModel::get();
        $konten = view('user.pages.LandingPage', $data);
        $js = asset('controller_js/home.js');


        $put['title'] = 'Halaman Home';
        $put['konten'] = $konten;
        $put['js'] = $js;


        return view('user.template.main', $put);
    }
}
