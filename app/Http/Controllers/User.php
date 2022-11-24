<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUser;
use Illuminate\Support\Facades\Hash;

class User extends Controller
{
    public function index()
    {
        $data = [
            'dataUser' => ModelUser::join('divisi', 'divisi.id_divisi', '=', 'users.id_divisi')
                ->join('jabatan', 'jabatan.id_jabatan', '=', 'users.id_jabatan')
                ->paginate()
        ];
        return View('user.data', $data);
    }
    public function add()
    {
        return View('user.tambah');
    }
    public function save(Request $r)
    {
        $username = $r->username;
        $password = $r->password;
        $nik = $r->nik;
        $nama = $r->nama;
        $idjabatan = $r->id_jabatan;
        $iddivisi = $r->id_divisi;
        $role = $r->role;

        try {
            $user = new ModelUser;
            $user->username = $username;
            $user->password = Hash::make($password);
            $user->nik = $nik;
            $user->nama = $nama;
            $user->id_jabatan = $idjabatan;
            $user->id_divisi = $iddivisi;
            $user->role = $role;
            $user->create_at = date("Y-m-d H:i:s");
            $user->update_at = date("Y-m-d H:i:s");
            $user->register_by = '';
            $user->save();
            // echo 'Data Berhasil tersimpan';
            $r->session()->flash('msg', "Berhasil menambahkan data $nama");
            return redirect('/user/tambah');
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    public function edit($id)
    {
        $user = ModelUser::find($id);
        $user = [
            'id' => $id,
            'username' => $user->username,
            'password' => $user->password,
            'nik' => $user->nik,
            'nama' => $user->nama,
            'id_jabatan' => $user->id_jabatan,
            'id_divisi' => $user->id_divisi,
            'role' => $user->role,
            'create_at' => $user->create_at,
            'update_at' => $user->update_at,
            'register_by' => $user->register_by
        ];
        return View('user/edit', $user);
    }
    public function update(Request $r)
    {
        $id = $r->id;
        $username = $r->username;
        $password = $r->password;
        $nik = $r->nik;
        $nama = $r->nama;
        $idjabatan = $r->id_jabatan;
        $iddivisi = $r->id_divisi;
        $role = $r->role;
        $create_at = $r->create_at;
        $register_by = $r->register_by;

        try {
            $user = ModelUser::find($id);
            $user->username = $username;
            $user->password = $password;
            $user->nik = $nik;
            $user->nama = $nama;
            $user->id_jabatan = $idjabatan;
            $user->id_divisi = $iddivisi;
            $user->role = $role;
            $user->create_at = $create_at;
            $user->register_by = $register_by;
            $user->update_at = date("Y-m-d H:i:s");
            $user->save();
            // echo 'Data Berhasil tersimpan';
            $r->session()->flash('msg', "Berhasil memperbarui data $nama");
            return redirect('/user/index');
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    public function delete($id)
    {
        ModelUser::find($id)->delete();
        return redirect()->back();
    }
}
