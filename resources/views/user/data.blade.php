<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Data User</title>
</head>
<body>
    <button type="button" onclick="window.location='/user/tambah'">Tambah User</button>
    @if (session('msg'))
        {{ session('msg') }}
    @endif
    <table>
        <thead>
            <th>No</th>
            <th>Nama</th>
            <th>Role</th>
            <th>Action</th>
        </thead>
        <tbody>
            @foreach ($dataUser as $u)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $u->nama }}</td>
                    <td>{{ $u->role }}</td>
                    <td><button type="button" onclick="window.location='/user/edit/{{ $u->id }}'">Edit</button>
                    <form action="/user/delete/{{ $u->id }}" method="post" style="display: inline" onsubmit="return Del()">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <script>
        function Del(){
            pesan = confirm('Konfirmasi hapus data');
            if (pesan) return true; else return false;
        }
    </script>
</body>
</html>