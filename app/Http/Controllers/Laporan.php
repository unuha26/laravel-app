<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ModelLaporan;

class Laporan extends Controller
{
    public function index()
    {
        $data = [
            'riwayatPart' => ModelLaporan::select(
                "riwayat.id",
                "data_part.kode_part as kodepart",
                "data_part.nama_part as namapart",
                "riwayat.tanggal",
                "riwayat.tanggal_selesai",
                "crane.crane as crane",
                "users.nama as mekanik",
                "grup.grup as grup",
                "grup.shift as shift",
                "riwayat.keterangan",
                "riwayat.status"
            )
                ->join('data_part', 'data_part.id', '=', 'riwayat.id_part')
                ->join('crane', 'crane.id_crane', '=', 'riwayat.id_crane')
                ->join('users', 'users.id', '=', 'riwayat.id_users')
                ->join('grup', 'grup.id', '=', 'riwayat.id_grup')
                ->paginate()
        ];
        return View('laporan.data', $data);
    }
    public function add()
    {
        // $data = ModelLaporan::table('lokasi')->distinct()->get();
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
            $part = new ModelLaporan;
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
        $part = ModelLaporan::find($id);
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
            $part = ModelLaporan::find($id);
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
        ModelLaporan::find($id)->delete();
        return redirect()->back();
    }
}
