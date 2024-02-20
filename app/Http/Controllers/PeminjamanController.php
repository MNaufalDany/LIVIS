<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Barang;
use App\Models\Peminjaman;
use Illuminate\Http\Request;

class PeminjamanController extends Controller
{
    public function index()
    {
        $peminjaman = Peminjaman::orderByDesc('created_at')->paginate(5);
        //dd($peminjaman);
        return view('peminjaman.index', compact('peminjaman'));
    }

    public function create()
    {
        $data = Siswa::all();
        $data2 = Barang::all();
        return view('peminjaman.create', compact('data', 'data2'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_barang' => 'required',
            'tgl_pinjam' => 'required'
        ]);

        Peminjaman::create([
            'id_siswa' => $request->id_siswa,
            'id_barang' => $request->id_barang,
            'tgl_pinjam' => $request->tgl_pinjam
        ]);

        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function showDetail($id)
    {
        $peminjaman = Peminjaman::findOrFail($id);
        return view('peminjaman.detail', compact('peminjaman'));
    }
    
    public function edit($id)
    {
        $peminjaman = Peminjaman::where('id', $id)->first();
        return view('peminjaman.edit', compact('peminjaman'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'tgl_kembali' => 'required',
            'kondisi' => 'required',
        ]);


        $data = [
            'tgl_kembali' => $request->tgl_kembali,
            'kondisi' => $request->kondisi,
        ];


        Peminjaman::where('id', $id)->update($data);
        return redirect('peminjaman')->with(['success' => 'Data Berhasil Diupdate!']);
    }



    public function delete(Request $request, $id)
    {
        $peminjaman = Peminjaman::find($request->id);
        // return $guru;
        $peminjaman->delete();

        //redirect to index
        return redirect()->route('peminjaman.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
