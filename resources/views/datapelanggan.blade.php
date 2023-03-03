@extends('layouts.main')
@section('main')

<style type="text/css">
    .pagination li {
        float: left;
        list-style-type: none;
        margin: 5px;
    }
</style>
<h1 class="text-center mb-4">Data Pelanggan</h1>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <a href="/tdpelanggan"><button type="button" class="btn btn-success mb-3">Tambah data +</button></a>

            <div class="card">

                @if ($message = Session::get('success'))

                <div class="alert alert-primary" role="alert" style="width: 200px;">
                    {{ $message }}
                </div>

                @endif

                <table class="table table-bordered">
                    <thead class="card-header">
                        <tr>
                            <th scope="col" style="width: 10px;">
                                <center>No</center>
                            </th>
                            <th scope="col" style="width: 150px;">
                                <center>Nama</center>
                            </th>
                            <th scope="col" style="width: 60px;">
                                <center>Jenis laundry</center>
                            </th>
                            <th scope="col" style="width: 30px;">
                                <center>Jenis paket</center>
                            </th>
                            <th scope="col" style="width: 30px;">
                                <center>Berat</center>
                            </th>
                            <th scope="col" style="width: 30px;">
                                <center>Status</center>
                            </th>
                            <th scope="col" style="width: 30px;">
                                <center>Harga</center>
                            </th>
                            <th scope="col" style="width: 130px;">
                                <center>Menu</center>
                            </th>
                        </tr>
                    </thead>
                    <tbody class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                @php $no = 1; @endphp
                                @foreach ($data as $row)
                                <tr>
                                    <td scope="row">{{ $no++ }}</td>
                                    <td>{{ $row->namapelanggan }}</td>
                                    <td>{{ $row->jenislaundry }}</td>
                                    <td>{{ $row->paket }}</td>
                                    <td>{{ $row->berat }}</td>
                                    <td>
                                        <center>
                                            <div class="progress" style="width: 45px;">
                                                <div class="progress-bar {{ ($row->status == 'selesai') ? 'bg-success' : 'bg-danger' }}" style="width: 100%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="20">{{ $row->status }}</div>
                                            </div>
                                        </center>
                                    </td>
                                    <td>{{ $row->harga }}</td>
                                    <td>
                                        <center>
                                            @if( $row->status === 'proses')
                                            <a href="/edpelanggan/{{ $row->id }}" type="button" class="btn btn-warning">Edit</a>
                                            <a href="#" type="button" class="btn btn-danger delete" data-id="{{ $row->id }}" data-nama="{{ $row->namapembeli }}">Hapus</a>
                                            @endif
                                            <a href="/cpdfp/{{ $row->id }}" type="button" class="btn btn-primary">PDF</a>
                                        </center>
                                    </td>
                                </tr>
                                @endforeach
                            </div>
                        </div>
                </table>
                </tbody>
                <div class="card-footer">
                    <div class="row">
                    </div>

                    Halaman : {{ $data->currentPage() }} <br />
                    Jumlah Data : {{ $data->total() }} <br />
                    Data Per Halaman : {{ $data->perPage() }} <br />


                    {{ $data->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection