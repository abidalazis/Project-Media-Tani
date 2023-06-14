<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::latest()->get();
        return view('dashboard.kategori.index', compact('kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.kategori.create');
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
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',

        ]);

        $input = $request->all();

        if ($request->has('gambar')) {
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('img/uploads/kategori', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }

        Kategori::create($input);
        
        return redirect('dashboard/kategori/')->with(['success' => 'Data Kategori Berhasil Disimpan!']);
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(Kategori $kategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(Kategori $kategori)
    {
        return view('dashboard.kategori.edit',[
            'kategori' => $kategori], compact('kategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kategori $kategori)
    {
        $request->validate([
            'nama_kategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',

        ]);
        $input = $request->all();
        
        if ($request->has('gambar')) {
            File::delete('img/uploads/kategori/' . $kategori->gambar);
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('img/uploads/kategori', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }

        $kategori->update($input);
        // Kategori::where('id', $kategori->id)->update($input);
        
        
        return redirect('dashboard/kategori/')->with(['success' => 'Data Kategori Berhasil Diedit!']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kategori $kategori, Request $request)
    {
        File::delete('img/uploads/kategori/' . $kategori->gambar);
        $kategori->delete();   

        return redirect('dashboard/kategori/')->with(['success' => 'Data Kategori Berhasil Dihapus!']);
    }
}
