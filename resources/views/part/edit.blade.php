@extends('dashboard.main')
@section('title')
Edit Spare Part
@endsection
@section('content')
<div class="card">
    <div class="card-body">

        <button type="button" class="btn btn-primary" onclick="window.location='/part'">Kembali</button>
        <form action="{{ url('/part/update') }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="mb-3 mt-4">
                <label for="kodepart" class="form-label">Kode Part</label>
                <input class="form-control" type="text" name="kode_part" value="{{ $kode_part }}">
            </div>
            <div class="mb-3">
                <label for="namapart" class="form-label">Nama Part</label>
                <input class="form-control" type="text" name="nama_part" id=""  value="{{ $nama_part }}">
            </div>
            <div class="mb-3">
                <label for="lokasi" class="form-label">Lokasi Part</label>
                <input class="form-control" type="text" name="lokasi" id="" value="{{ $lokasi }}">
            </div>
            <div class="mb-3">
                <label for="jumlah" class="form-label">Jumlah</label>
                <input class="form-control" type="text" name="jumlah" id="" value="{{ $jumlah }}">
            </div>
            <div class="mb-3">
                <label for="statuspart" class="form-label">Jabatan</label>
                <input class="form-control" type="text" name="status_part" id="" value="{{ $status_part }}">
            </div>
            <div class="mb-3">
                <label for="detail" class="form-label">Jabatan</label>
                <input class="form-control" type="text" name="detail" id="" value="{{ $detail }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
