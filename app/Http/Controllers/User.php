<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ModelUser;

class User extends Controller
{
    public function index()
    {
        $data=[
            'dataUser' => ModelUser::all()
        ];
        return View('user.data', $data);
    }
    public function add()
    {
        return View('user.tambah');
    }
    public function save(Request $r)
    {
        $username = $r -> username;
        $nama = $r -> nama;
        $password = $r -> password;
        $role = $r -> role;

        try {
            $user = new ModelUser;
            $user -> username = $username;
            $user -> nama = $nama;
            $user -> password = $password;
            $user -> role = $role;
            $user -> create_at = date ("Y-m-d H:i:s");
            $user -> update_at = date ("Y-m-d H:i:s");
            $user -> register_by = '';
            $user -> save();
            // echo 'Data Berhasil tersimpan';
            $r->session()->flash('msg', "Berhasil menambahkan data $nama");
            return redirect('/user/tambah');
        } catch (\Throwable $e) {
            echo $e;
        }
        
    }
    public function edit($id){
        $user = ModelUser::find($id);
        $user = [
            'id' => $id,
            'username' => $user -> username,
            'nama' => $user -> nama,
            'password' => $user -> password,
            'role' => $user -> role,
            'create_at' => $user -> create_at,
            'update_at' => $user -> update_at,
            'register_by' => $user -> register_by
        ];
        return View('user/edit', $user);
    }
    public function update(Request $r)
    {
        $username = $r -> username;
        $id = $r -> id;
        $nama = $r -> nama;
        $password = $r -> password;
        $role = $r -> role;
        $create_at = $r -> create_at;
        $register_by = $r -> register_by;

        try {
            $user = ModelUser::find($id);
            $user -> username = $username;
            $user -> nama = $nama;
            $user -> password = $password;
            $user -> role = $role;
            $user -> create_at = $create_at;
            $user -> register_by = $register_by;
            $user -> update_at = date ("Y-m-d H:i:s");
            $user -> save();
            // echo 'Data Berhasil tersimpan';
            $r->session()->flash('msg', "Berhasil memperbarui data $nama");
            return redirect('/user/index');
        } catch (\Throwable $e) {
            echo $e;
        }
        
    }
    public function delete($id){
        ModelUser::find($id)->delete();
        return redirect() -> back();
    }
}
