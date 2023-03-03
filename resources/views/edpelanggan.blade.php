@extends('layouts.main')
@section('main')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"><strong>Edit data {{ $objek }}</strong></h3>
                <form action="/udpelanggan/{{ $data->id }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama {{ $objek }}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sapa" name="namapelanggan" value="{{ $data->namapelanggan }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis laundry</label>
                        <select class="custom-select form-control" name="jenislaundry">
                            <option selected>{{ $data->jenislaundry }}</option>
                            <option value="1">Pakaian</option>
                            <option value="2">Jaket</option>
                            <option value="3">Bedcover</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis paket</label>
                        <select class="custom-select form-control" name="paket">
                            <option selected>{{ $data->paket }}</option>
                            <option value="1">Bronze</option>
                            <option value="2">Silver</option>
                            <option value="3">Gold</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Berat</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="54" name="berat" value="{{ $data->berat }}">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select class="custom-select form-control" name="status">
                            <option selected>{{ $data->status }}</option>
                            <option value="1">Proses</option>
                            <option value="2">Selesai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection