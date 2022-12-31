@extends('dashboard.main')
@section('title')
Add Spare Part
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-primary" onclick="window.location='/part'">Kembali</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <form action="{{ url('/part/simpan') }}" method="post">
            @csrf
            <div class="mb-3 mt-4">
                <label for="kodepart" class="form-label">Kode Part</label>
                <input class="form-control" type="text" name="kodepart" id="">
            </div>
            <div class="mb-3">
                <label for="namapart" class="form-label">Nama Part</label>
                <input class="form-control" type="text" name="namapart" id="">
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi</label>
                <input class="form-control" type="text" name="lokasi" id="">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input class="form-control" type="text" name="jumlah" id="">
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <input class="form-control" type="text" name="status" id="">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Detail</label>
                <input class="form-control" type="text" name="detail" id="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
