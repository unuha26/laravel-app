<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit User</title>
</head>
<body>
    <button type="button" onclick="window.location='/user/index'">Kembali</button>
    <form action="{{ url('/user/update') }}" method="post">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{ $id }}">
        <input type="hidden" name="create_at" value="{{ $create_at }}">
        <input type="hidden" name="register_by" value="{{ $register_by }}">
        <input type="text" name="username" id="" value="{{ $username }}">
        <input type="password" name="password" id="" value="{{ $password }}">
        <input type="text" name="nama" id="" value="{{ $nama }}">
        <input type="number" name="role" id="" value="{{ $role }}">
        <button type="submit">Update</button>
    </form>
</body>
</html>