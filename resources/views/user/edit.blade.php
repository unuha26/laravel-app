@extends('dashboard.main')
@section('title')
Edit User
@endsection
@section('content')
<div class="card">
    <div class="card-body">

        <button type="button" class="btn btn-primary" onclick="window.location='/user'">Kembali</button>
        <form action="{{ url('/user/update') }}" method="post">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $id }}">
            <input type="hidden" name="create_at" value="{{ $create_at }}">
            <input type="hidden" name="register_by" value="{{ $register_by }}">
            <div class="mb-3 mt-4">
                <label for="username" class="form-label">Username</label>
                <input class="form-control" type="text" name="username" id="" value="{{ $username }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input class="form-control" type="password" name="password" id="" value="">
            </div>
            <div class="mb-3">
                <label for="nik" class="form-label">Nik</label>
                <input class="form-control" type="text" name="nik" id="" value="{{ $nik }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input class="form-control" type="text" name="nama" id="" value="{{ $nama }}">
            </div>
            <div class="mb-3">
                <label for="id_jabatan" class="form-label">Jabatan</label>
                <input class="form-control" type="text" name="id_jabatan" id="" value="{{ $id_jabatan }}">
            </div>
            <div class="mb-3">
                <label for="id_divisi" class="form-label">Divisi</label>
                <input class="form-control" type="text" name="id_divisi" id="" value="{{ $id_divisi }}">
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Role</label>
                <input class="form-control" type="text" name="role" id="" value="{{ $role }}">
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection
