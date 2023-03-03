@extends('layouts.main')
@section('main')

<style type="text/css">
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<h1 class="text-center mb-4">Data Kedai</h1>
<div class="container">
    <a href="/tdkedai"><button type="button" class="btn btn-success mb-3">Tambah data +</button></a>
    <div class="row g-3 align-items-center mt-2">
        <div class="col-auto">
            <form action="/dkedai">
                <input type="search" name="search" class="form-control">
            </form>
        </div>
    </div>
    <div class="row">

        @if ($message = Session::get('success'))

        <div class="alert alert-primary" role="alert">
            {{ $message }}
        </div>

        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th scope="col" style="width: 40px;">
                        <center>No</center>
                    </th>
                    <th scope="col" style="width: 200px;">
                        <center>Nama</center>
                    </th>
                    <th scope="col" style="width: 250px;">
                        <center>Alamat</center>
                    </th>
                    <th scope="col" style="width: 100px;">
                        <center>No.HP</center>
                    </th>
                    <th scope="col" style="width: 150px;">
                        <center>Menu</center>
                    </th>
                </tr>
            </thead>
            <tbody>
                @php $no = 1; @endphp
                @foreach ($data as $row)
                <tr>
                    <td scope="row">{{ $no++ }}</td>
                    <td>{{ $row->namakedai }}</td>
                    <td>{{ $row->alamatkedai }}</td>
                    <td>+62 {{ $row->nohpkedai }}</td>
                    <td>
                        <center>
                            <a href="/edkedai/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                            <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->namakedai }}">Hapus</a>
                            <a href="/convertpdf/{{ $row->id }}" type="button" class="btn btn-primary">PDF</a>
                        </center>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <br />
    Halaman : {{ $data->currentPage() }} <br />
    Jumlah Data : {{ $data->total() }} <br />
    Data Per Halaman : {{ $data->perPage() }} <br />


    {{ $data->links() }}
</div>
@endsection