<?php

namespace App\Http\Controllers;

use App\Models\keranjang;
use App\Models\pesanan;
use App\Models\pesanan_detail;
use Illuminate\Http\Request;

class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = keranjang::all();
        $total = $cart->sum('harga');
        return view('home.keranjang.index', compact('cart', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $randomNumber = random_int(1000, 9999);
        keranjang::create([
            'id_order'  =>$randomNumber,
            'nama_barang' => $request->nama_barang,
            'harga'=> $request->harga,
            'jumlah' => 1,
            'total' => $request->harga
        ]);
        return redirect('/cart');
    }

    // public function front_checkout(Request $request)
    // {
    //     $randomNumber = random_int(1000, 9999);
    //     pesanan::create([
    //         'id_order'  =>$randomNumber,
    //         'total' => $request->total
    //     ]);
    //     pesanan_detail::create([
            
    //         'id_order'  => 'id_order',
    //         'nama_barang' => $request->nama_barang,
    //         'harga'=> $request->harga,
    //         'jumlah' => 1,
    //         'total' => $request->harga
    //     ]);
    //     return redirect('/cart');
    // }


    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keranjang = keranjang::find($id);
        $keranjang->delete();

        return redirect('/cart');

    }
}