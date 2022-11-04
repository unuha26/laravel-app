@extends('dashboard.main')
@section('title')
Add User
@endsection
@section('content')
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-primary" onclick="window.location='/user'">Kembali</button>
        @if (session('msg'))
        <i style="float: right;">{{ session('msg') }}</i>
        @endif
        <form action="{{ url('/user/simpan') }}" method="post">
            @csrf
            <div class="mb-3 mt-4">
                <label for="username" class="form-label">Username</label>
                <input class="form-control" type="text" name="username" id="">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" id="">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nik</label>
                <input class="form-control" type="text" name="nik" id="">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input class="form-control" type="text" name="nama" id="">
            </div>
            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan</label>
                <input class="form-control" type="text" name="id_jabatan" id="">
            </div>
            <div class="mb-3">
                <label for="id_divisi" class="form-label">Divisi</label>
                <input class="form-control" type="text" name="id_divisi" id="">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input class="form-control" type="text" name="role" id="">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
</div>
@endsection
