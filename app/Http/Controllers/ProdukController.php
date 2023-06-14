<?php

namespace App\Http\Controllers;

use Dotenv\Validator;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class ProdukController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $subkategori = Subkategori::with('kategori')->latest()->get();
        $produk = Produk::with('subkategori')->latest()->get();
        return view('dashboard.produk.index' , compact('subkategori','produk','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.produk.create',[
            'categories'=> Kategori::all(),
            'subcategories'=> Subkategori::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            
            'id_kategori' => 'required',
            'id_subkategori' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'bahan' => 'required',
            'ukuran' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',

        ]);
     
        $input = $request->all();

        if ($request->has('gambar')) {
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('img/uploads/produk', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }
        Produk::create($input);
        
        return redirect('dashboard/produk/')->with(['success' => 'Data SubKategori Berhasil Disimpan!']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('dashboard.produk.edit',[
            'produk' => $produk], compact('produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $request->validate([
            
            'id_kategori' => 'required',
            'id_subkategori' => 'required',
            'nama_barang' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'diskon' => 'required',
            'bahan' => 'required',
            'ukuran' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',

        ]);
     
        $input = $request->all();

        if ($request->has('gambar')) {
            File::delete('img/uploads/produk/' . $produk->gambar);
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('img/uploads/produk', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }
        $produk->update($input);
        
        return redirect('dashboard/produk/',[
            'categories'=> Kategori::all(),
            'subcategories'=> Subkategori::all()
        ])->with(['success' => 'Data produk Berhasil Disimpan!']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        File::delete('img/uploads/produk/' . $produk->gambar);
        $produk->delete();   

        return redirect('dashboard/produk/')->with(['success' => 'Data Produk Berhasil Dihapus!']);
    
    }
}
