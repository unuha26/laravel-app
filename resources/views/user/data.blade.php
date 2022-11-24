@extends('dashboard.main')
@section('title')
Data User
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <button class="btn btn-primary" type="button" onclick="window.location='/user/tambah'">Tambah User</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <table class="table table-hover">
            <thead>
                <th scope="col">No</th>
                <th scope="col">Nik</th>
                <th scope="col">Nama</th>
                <th scope="col">Jabatan</th>
                <th scope="col">Divisi</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </thead>
            <tbody>
                @foreach ($dataUser as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->nik }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->jabatan }}</td>
                    <td>{{ $u->divisi }}</td>
                    <td>{{ $u->role }}</td>
                    <td><button type="button" onclick="window.location='/user/edit/{{ $u->id }}'" class="btn btn-warning">Edit</button>
                        <form action="/user/delete/{{ $u->id }}" method="post" style="display: inline" onsubmit="return Del()">
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
