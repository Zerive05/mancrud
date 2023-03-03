<?php

namespace App\Http\Controllers;

use App\Models\Kedai;
use PDF;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PelangganController extends Controller
{
    public function dpelanggan(Request $request)
    {
        $data = Pelanggan::paginate(2);
        $status = $request->status;
        return view('datapelanggan', compact('data', 'status'), [
            "tittle" => "Pelanggan",
            "page" => "Data",
            "linkhd" => "hdpelanggan",
            "data" => $data
        ]);
    }

    public function tdpelanggan()
    {
        return view('tdpelanggan', [
            "tittle" => "pelanggan",
            "page" => "Tambah data",
            "objek" => "pelanggan",
            "linkid" => "idpelanggan",
        ]);
    }

    public function idpelanggan(Request $request)
    {
        $berat = $request->berat;
        $hargapaket = ['gold' => 15000, 'silver' => 10000, 'bronze' => 5000];
        $harga = $berat * $hargapaket[$request->paket];

        DB::table('pelanggans')->insert([
            'namapelanggan' => $request->namapelanggan,
            'jenislaundry' => $request->jenislaundry,
            'paket' => $request->paket,
            'berat' => $request->berat,
            'status' => 'proses',
            'harga' => $harga,
        ]);
        return redirect()->route('dpelanggan')->with('Success', 'Data berhasil ditambahkan');
    }

    public function edpelanggan($id)
    {
        $data = Pelanggan::find($id);
        return view('edpelanggan', compact('data'), [
            "tittle" => "pelanggan",
            "page" => "Edit data pelanggan",
            "objek" => "pelanggan",
        ]);
    }

    public function udpelanggan(Request $request, $id)
    {
        $data = Pelanggan::find($id);
        $berat = $request->berat;
        $hargapaket = ['gold' => 15000, 'silver' => 10000, 'bronze' => 5000];
        $harga = $berat * $hargapaket[$request->paket];
        $data->update([
            'namapelanggan' => $request->namapelanggan,
            'jenislaundry' => $request->jenislaundry,
            'paket' => $request->paket,
            'berat' => $request->berat,
            'status' => $request->status,
            'harga' => $harga,
        ]);
        return redirect()->route('dpelanggan')->with('success', 'Data Berhasil Diedit');
    }

    public function hdpelanggan($id)
    {
        $data = Pelanggan::find($id);
        $data->delete();
        return redirect()->route('dpelanggan')->with('success', 'Data Berhasil Dihapus');
    }

    public function cpdfp(Request $request, $id)
    {
        $dataplgn = Pelanggan::find($request->id);
        view()->share('dataplgn', $dataplgn);
        $data['pelanggan'] = Pelanggan::find($id);
        $pdf = PDF::loadview('pdfp', $data, [
            "tittle" => "Pelanggan",
            "page" => "Convert pdf",
        ])->setOptions(['defaultFont' => 'sans-serif']);
        return $pdf->stream('dataplgn' . $dataplgn->nama . '.pdf');
    }
}
