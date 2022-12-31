@extends('dashboard.main')
@section('title')
Minta Spare Part
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-primary" onclick="window.location='/part'">Kembali</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <form action="{{ url('/part/mintasimpan') }}" method="post">
            @csrf
            <div class="mb-3 mt-4">
                <label for="kodepart" class="form-label">Kode Part</label>
                <input class="form-control" type="text" name="kodepart" id="">
            </div>
            <div class="mb-3">
                <label for="namapart" class="form-label">Nama Part</label>
                <input class="form-control" type="text" name="namapart" id="">
            </div>
            <button type="submit" class="btn btn-primary">Minta Part</button>
        </form>
    </div>
</div>
@endsection
