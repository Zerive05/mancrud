<?php

namespace App\Http\Controllers;

use App\Models\Kedai;
use Illuminate\Http\Request;

class KedaiController extends Controller
{
    public function dkedai(Request $request)
    {
        if($request->has('search')){
            $data = Kedai::where('namakedai', 'LIKE', '%' .$request->search.'%')->paginate(2);
        }else {
            $data = Kedai::paginate(2);
        }
        return view('datakedai', compact('data'), [
            "tittle" => "Kedai",
            "page" => "Data",
            "linkhd" => "hdkedai",
            "data" => $data,
        ]);
    }

    public function tambahdata()
    {
        return view('tambahdata', [
            "tittle" => "Kedai",
            "page" => "Tambah data kedai",
            "objek" => "kedai",
            "linkid" => "idkedai",
            "nama" => "namakedai",
            "alamat" => "alamatkedai",
            "nohp" => "nohpkedai",
        ]);
    }

    public function insertdata(Request $request)
    {
        Kedai::create($request->all());
        return redirect()->route('dkedai')->with('Success', 'Data berhasil ditambahkan');
    }

    public function editdata($id)
    {
        $data = Kedai::find($id);
        return view('editdata', compact('data'), [
            "tittle" => "Kedai",
            "page" => "Edit data",
            "objek" => "kedai",
            "linkud" => "udkedai",
            "nama" => "namakedai",
            "alamat" => "alamatkedai",
            "nohp" => "nohpkedai",
        ]);
    }

    public function updatedata(Request $request, $id)
    {
        $data = Kedai::find($id);
        $data->update($request->all());
        return redirect()->route('dkedai')->with('success', 'Data Berhasil Diupdate');
    }

    public function hdkedai($id)
    {
        $data = Kedai::find($id);
        $data->delete();
        return redirect()->route('dkedai')->with('success', 'Data Berhasil Dihapus');
    }
}
