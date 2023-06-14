<?php

namespace App\Http\Controllers;

use App\Models\Subkategori;
use App\Models\Kategori;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SubkategoriController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:api')->except(['indek']);
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = Kategori::all();
        $subkategori = Subkategori::with('kategori')->latest()->get();
        return view('dashboard.subkategori.index' , compact('subkategori','kategori'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.subkategori.create',[
            'categories'=> Kategori::all()
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
            'nama_subkategori' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',

        ]);

        $input = $request->all();

        if ($request->has('gambar')) {
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('img/uploads/subkategori', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }

        Subkategori::create($input);
        
        return redirect('dashboard/subkategori/')->with(['success' => 'Data SubKategori Berhasil Disimpan!']);
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function show(Subkategori $subkategori)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function edit(Subkategori $subkategori)
    {
        return view('dashboard.subkategori.edit',[
            'subkategori' => $subkategori], compact('subkategori'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subkategori $subkategori)
    {
        $request->validate([
            'nama_subkategori' => 'required',
            'deskripsi' => 'required',

        ]);
        $input = $request->all();
        
        if ($request->has('gambar')) {
            File::delete('img/uploads/subkategori/' . $subkategori->gambar);
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('img/uploads/subkategori', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }else {
            unset($input['gambar']);
        }

        $subkategori->update($input);
        // subKategori::where('id', $subkategori->id)->update($input);
        
        
        return redirect('dashboard/subkategori/')->with(['success' => 'Data subKategori Berhasil Diedit!']);
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kategori  $kategori
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subkategori $subkategori)
    {
        File::delete('img/uploads/subkategori/' . $subkategori->gambar);
        $subkategori->delete();   

        return redirect('dashboard/subkategori/')->with(['success' => 'Data Subkategori Berhasil Dihapus!']);
    
    }
}
