<?php

namespace App\Http\Controllers;

use App\Models\Beranda;
use App\Models\Kedai;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    public function index()
    {
        $data = Beranda::all();
        $todkedai = Kedai::count();
        $todpelanggan = Pelanggan::count();
        $statusproses = Pelanggan::where('status', 'proses')->count();
        $statusselesai = Pelanggan::where('status', 'selesai')->count();
        return view('beranda', compact('data', 'statusproses', 'statusselesai', 'todpelanggan', 'todkedai'), [
            "tittle" => "Laundry",
            "page" => "Beranda",
            "linkhd" => "hdkedai",
        ]);
    }
}
