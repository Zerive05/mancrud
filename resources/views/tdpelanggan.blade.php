@extends('layouts.main')
@section('main')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"><strong>Tambah data {{ $objek }}</strong></h3>
                <form action="{{ $linkid }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama {{ $objek }}</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sapa" name="namapelanggan">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis laundry</label>
                        <select class="custom-select form-control" name="jenislaundry">
                            <option value="1">Pakaian</option>
                            <option value="2">Jaket</option>
                            <option value="3">Bedcover</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis paket</label>
                        <select class="custom-select form-control" name="paket">
                            <option value="bronze">Bronze</option>
                            <option value="silver">Silver</option>
                            <option value="gold">Gold</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Berat</label>
                        <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="54" name="berat">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection