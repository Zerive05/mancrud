<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function dproduk()
    {
        $data = Produk::paginate(2);
        return view('dataproduk', compact('data'), [
            "tittle" => "Data",
            "data" => $data
        ]);
    }

    public function tambahdata()
    {
        return view('tambahdata', [
            "tittle" => "Tambah data produk"
        ]);
    }

    public function insertdata(Request $request)
    {
        Produk::create($request->all());
        return redirect()->route('dproduk')->with('Success', 'Data berhasil ditambahkan');
    }

    public function editdata($id)
    {
        $data = Produk::find($id);
        return view('editdata', compact('data'), [
            "tittle" => "Edit data produk"
        ]);
    }

    public function updatedata(Request $request, $id)
    {
        $data = Produk::find($id);
        $data->update($request->all());
        return redirect()->route('dproduk')->with('success', 'Data Berhasil Diupdate');
    }

    public function hapusdata($id)
    {
        $data = Produk::find($id);
        $data->delete();
        return redirect()->route('dproduk')->with('success', 'Data Berhasil Dihapus');
    }
}
