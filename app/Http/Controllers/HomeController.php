<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Orderdetail;
use App\Models\Subkategori;
use App\Models\Produk;

class HomeController extends Controller
{
   
    public function index()
    {
        $kategori = Kategori::all();
        $produk = Produk::all();

        return view('home.index', compact('kategori', 'produk'));
    }
    
    public function produk()
    {

         $kategori = Kategori::all();
        $subkategori = Subkategori::with('kategori')->latest()->get();
        $produk = Produk::with('subkategori')->latest()->get();
        return view('home.produk.index' , compact('subkategori','produk','kategori'));
    }
    public function produks($id_subkategori)
    {
        // $kategori = Kategori::all();
        // $subkategori = Subkategori::with('kategori')->latest()->get();
        // $produk = Produk::with('subkategori')->latest()->get();
        // return view('home.produk.index' , compact('subkategori','produk','kategori'));

        $produks = Produk::where('id_subkategori' , $id_subkategori)->get();
        return view('home.produk.kategori', compact('produks'));
    }
    public function detail($id_produk)
    {
        // $kategori = Kategori::all();
        // $subkategori = Subkategori::with('kategori')->latest()->get();
        // $produk = Produk::with('subkategori')->latest()->get();
        // return view('home.produk.index' , compact('subkategori','produk','kategori'));

        $produks = Produk::find($id_produk);
        return view('home.produk.detail', compact('produks'));
    }

    public function kontak()
    {
        return view('home.kontak.index');
    }
    public function kirim()
    {
        $nama=$_POST['nama'];
        $nomer=$_POST['nomer'];
        $pesan=$_POST['pesan'];
        return redirect('https://api.whatsapp.com/send?phone=6282229119060/&text=Nama%20%3A%20'.$nama.'%0ANomer%20%3A%20'.$nomer.'%0APesan%20%3A%20'.$pesan.'%0A');
    }

    public function keranjang()
    {
        return view('home.keranjang.index');
    }

    public function tambah_kerangjang(Request $request)
    {
        Orderdetail::create([
            'id_produk' => $request->id_produk,
            'qty' => 1
        ]);
        return view('home.keranjang.index');
    }



    public function tentang()
    {
        return view('home.tentang.index');
    }

    
}
