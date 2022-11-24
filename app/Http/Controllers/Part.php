<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelDataPart;

class Part extends Controller
{
    public function index()
    {
        $data = [
            'dataPart' => ModelDataPart::paginate()
        ];
        return View('part.data', $data);
    }
    public function add()
    {
        // $data = ModelDataPart::table('lokasi')->distinct()->get();
        return View('part.tambah');
    }
    public function save(Request $r)
    {
        $kodepart = $r->kodepart;
        $namapart = $r->namapart;
        $lokasi = $r->lokasi;
        $jumlah = $r->jumlah;
        $status = $r->status;

        try {
            $part = new ModelDataPart;
            $part->kode_part = $kodepart;
            $part->nama_part = $namapart;
            $part->lokasi = $lokasi;
            $part->jumlah = $jumlah;
            $part->status_part = $status;
            $part->save();
            // echo 'Data Berhasil tersimpan';
            $r->session()->flash('msg', "Berhasil menambahkan Part $namapart");
            return redirect('/part/tambah');
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    public function edit($id)
    {
        $part = ModelDataPart::find($id);
        $part = [
            'id' => $id,
            'kode_part' => $part->kode_part,
            'nama_part' => $part->nama_part,
            'lokasi' => $part->lokasi,
            'jumlah' => $part->jumlah,
            'status_part' => $part->status_part
        ];
        return View('part/edit', $part);
    }
    public function update(Request $r)
    {
        $id = $r->id;
        $kode_part = $r->kode_part;
        $nama_part = $r->nama_part;
        $lokasi = $r->lokasi;
        $jumlah = $r->jumlah;
        $status_part = $r->status_part;

        try {
            $part = ModelDataPart::find($id);
            $part->kode_part = $kode_part;
            $part->nama_part = $nama_part;
            $part->lokasi = $lokasi;
            $part->jumlah = $jumlah;
            $part->status_part = $status_part;
            $part->save();
            // echo 'Data Berhasil tersimpan';
            $r->session()->flash('msg', "Berhasil memperbarui data $nama_part");
            return redirect('/part/index');
        } catch (\Throwable $e) {
            echo $e;
        }
    }
    public function delete($id)
    {
        ModelDataPart::find($id)->delete();
        return redirect()->back();
    }
}
