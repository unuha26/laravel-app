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
                <th scope="col">Id</th>
                <th scope="col">Kode Part</th>
                <th scope="col">Nama Part</th>
                <th scope="col">Lokasi</th>
                <th scope="col">Jumlah</th>
                <th scope="col">Status</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($dataPart as $d)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $d->kode_part }}</td>
                    <td>{{ $d->nama_part }}</td>
                    <td>{{ $d->lokasi }}</td>
                    <td>{{ $d->jumlah }}</td>
                    <td>{{ $d->status_part }}</td>
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
<script>
    function Del() {
        pesan = confirm('Konfirmasi hapus data');
        if (pesan) return true;
        else return false;
    }
</script>
@endsection
