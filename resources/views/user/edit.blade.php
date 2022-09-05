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
        <input class="form-control" type="password" name="password" id="" value="{{ $password }}">
    </div>
    <div class="mb-3">
      <label for="nama" class="form-label">Nama</label>
        <input class="form-control" type="text" name="nama" id="" value="{{ $nama }}">
    </div>
    <div class="mb-3">
      <label for="role" class="form-label">Role</label>
        <input class="form-control" type="number" name="role" id="" value="{{ $role }}">
    </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
    </div>
</div>
@endsection