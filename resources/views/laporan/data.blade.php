@extends('dashboard.main')
@section('title')
Laporan Spare Part
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary" type="button" onclick="window.location='/laporan/tambah'">Tambah Laporan</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <table class="table table-hover">
            <thead>
                <th scope="col">No</th>
                <th scope="col">Kode Part</th>
                <th scope="col">Nama Part</th>
                <th scope="col">Tanggal Laporan</th>
                <th scope="col">Tanggal Penyelesaian</th>
                <th scope="col">Crane</th>
                <th scope="col">Mekanik</th>
                <th scope="col">Grup</th>
                <th scope="col">Shift</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($riwayatPart as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->kodepart }}</td>
                    <td>{{ $d->namapart }}</td>
                    <td>{{ $d->tanggal }}</td>
                    <td>{{ $d->tanggal_selesai }}</td>
                    <td>{{ $d->crane }}</td>
                    <td>{{ $d->mekanik }}</td>
                    <td>{{ $d->grup }}</td>
                    <td>{{ $d->shift }}</td>
                    <td>{{ $d->keterangan }}</td>
                    <td>{{ $d->status }}</td>
                    <td><button type="button" onclick="window.location='/laporan/edit/{{ $d->id }}'" class="btn btn-warning">Update</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<script>
    function Del() {
        pesan = confirm('Konfirmasi hapus data');
        if (pesan) return true;
        else return false;
    }
</script>
@endsection
