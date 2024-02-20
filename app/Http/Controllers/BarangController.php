<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BarangController extends Controller
{
    public function index()
    {
        $barangs = Barang::orderBy('nama_barang')->paginate(5);
        return view('barang.index', compact('barangs'));
    }


    public function create()
    {
        return view('barang.create');
    }


    
    /**
     * store
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        //validate form
        $this->validate($request, [
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nama_barang' => 'required',
        ]);
        
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/posts', $gambar->hashName());
        
        //create post
        Barang::create([
            'gambar' => $gambar->hashName(),
            'nama_barang' => $request->nama_barang,
        ]);
        

        //redirect to siswa
        return redirect('barang')->with(['success' => 'Data Berhasil Disimpan!']);
    }


    
    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        return view('barang.edit', compact('barang'));
    }
    
    public function update(Request $request, Barang $barang)
{
    // Validate form
    $this->validate($request, [
        'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'nama_barang' => 'required|min:5',
    ]);

    // Find barang by ID
    $barang = Barang::find($request->id);

    // Update nama_barang first
    $barang->nama_barang = $request->nama_barang;
    $barang->save();

    // Check if image is uploaded
    if ($request->hasFile('gambar')) {
        // Upload new image
        $image = $request->file('gambar');
        $image->storeAs('public/posts', $image->hashName());

        // Delete old image
        Storage::delete('public/posts/'.$barang->gambar);

        // Update post with new image
        $barang->gambar = $image->hashName();
        $barang->save();
    }

    // Redirect to index
    return redirect()->route('barang')->with(['success' => 'Data Berhasil Diubah!']);
}

    
    
    public function destroy(Request $request, $id)
    {
        $barang = Barang::find($id);
    
        // Hapus gambar dari penyimpanan jika ada
        if ($barang->gambar) {
            Storage::delete('public/posts/' . $barang->gambar);
        }
    
        // Hapus data dari database
        $barang->delete();
    
        // Redirect ke index
        return redirect()->route('barang')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
