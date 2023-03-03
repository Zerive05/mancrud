@extends('layouts.main')
@section('main')
<div class="container justify-content-center">
    <div class="row justify-content-center">
        <div class="card">
            <div class="card-body">
                <h3 class="text-center"><strong>Edit data {{ $objek }}</strong></h2>
                    <form action="{{ $linkud }}{{ $data->id }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Nama {{ $objek }}</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Sapa" name="{{ $nama }}" value="{{ $data->namakedai }}">
                        </div>

                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat {{ $objek }}</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="{{ $alamat }}" placeholder="Terserah, rt05 rw02">{{ $data->alamatkedai }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">No. HP {{ $objek }}</label>
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <input type="text" class="form-control" value="+62" readonly>
                                </div>
                                <div class="form-group col">
                                    <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="895678943" name="{{ $nohp }}" value="{{ $data->nohpkedai }}">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>

            </div>
        </div>
    </div>
</div>
@endsection