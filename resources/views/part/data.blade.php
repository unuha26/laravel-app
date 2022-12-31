@extends('dashboard.main')
@section('title')
Data Part
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary" type="button" onclick="window.location='/part/tambah'">Tambah Part</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <table class="table table-hover">
            <thead>
                <th scope="col">No</th>
                <th scope="col">Kode Part</th>
                <th scope="col">Nama Part</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Detail</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($dataPart as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->kode_part }}</td>
                    <td>{{ $d->nama_part }}</td>
                    <td>{{ $d->status_part }}</td>
                    <td>{{ $d->lokasi }}</td>
                    <td>{{ $d->jumlah }}</td>
                    <td>{{ $d->detail }}</td>
                    <td><button type="button" onclick="window.location='/part/edit/{{ $d->id }}'" class="btn btn-warning">Edit</button>
                        <form action="/part/delete/{{ $d->id }}" method="post" style="display: inline" onsubmit="return Del()">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary" type="button" onclick="window.location='/part/minta'">Minta Part</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <table class="table table-hover">
            <thead>
                <th scope="col">No</th>
                <th scope="col">Kode Part</th>
                <th scope="col">Nama Part</th>
                <th scope="col">Kondisi</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($dataPart as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->kode_part }}</td>
                    <td>{{ $d->nama_part }}</td>
                    <td>{{ $d->status_part }}</td>
                    <td>{{ $d->status_minta }}</td>
                    <td>
                    <button type="button" onclick="window.location='/part/edit/{{ $d->id }}'" class="btn btn-primary">Update</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary" type="button" onclick="window.location='/part/minta'">Minta Part</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <table class="table table-hover">
            <thead>
                <th scope="col">No</th>
                <th scope="col">No Crane</th>
                <th scope="col">Kode Kategori</th>
                <th scope="col">Kode Part</th>
                <th scope="col">Nama Part</th>
                <th scope="col">Keterangan</th>
                <th scope="col">Grup</th>
                <th scope="col">Konfirmasi</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($dataPart as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->no_crane }}</td>
                    <td>{{ $d->kode_Kategori }}</td>
                    <td>{{ $d->kode_part }}</td>
                    <td>{{ $d->nama_part }}</td>
                    <td>{{ $d->keterangan }}</td>
                    <td>{{ $d->grup }}</td>
                    <td>{{ $d->konfirmasi }}</td>
                    <td>
                    <button type="button" onclick="window.location='/part/edit/{{ $d->id }}'" class="btn btn-primary">Update</button>
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
