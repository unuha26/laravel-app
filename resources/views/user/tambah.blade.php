<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add User</title>
</head>
<body>
    <button type="button" onclick="window.location='/user/index'">Kembali</button>
    @if (session('msg'))
        {{ session('msg') }}
    @endif
    <form action="{{ url('/user/simpan') }}" method="post">
        @csrf
        <input type="text" name="username" id="" placeholder="Username">
        <input type="password" name="password" id="" placeholder="Password">
        <input type="text" name="nama" id="" placeholder="Nama">
        <input type="number" name="role" id="" placeholder="Role 1-3">
        <button type="submit">Simpan</button>
    </form>
</body>
</html>