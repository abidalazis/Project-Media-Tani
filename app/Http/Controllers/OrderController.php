<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Orderdetail;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api')->except(['indek']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $Order= Order::all();

        return response()->json([
            'data' => $Order
        ]);
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

        $validator = FacadesValidator::make($request->all(), [
            'id_member' => 'required',

        ]);

        if ($validator->fails()) {
            return response()->json(
                $validator->errors(), 422
            );
        }

        $input = $request->all();

       $Order = Order::create($input);

       Orderdetail::create($input);

       for ($i=0; $i < count($input['id_produk']) ; $i++) {
        Orderdetail::create([
            'id_order' =>$Order['id'],
            'id_produk' =>$input['id_produk'][$i],
            'jumlah' =>$input['jumlah'][$i],
            'ukuran' =>$input['ukuran'][$i],
            'total' =>$input['total'][$i],
        ]);
       }
       
        return response()->json([
            'data'=> $Order
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $Order)
    {
        return response()->json([
            'data'=> $Order
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $Order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $Order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $Order)
    {
        $validator = FacadesValidator::make($request->all(), [
            'id_member' => 'required',


        ]);
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(), 422
            );
        }

        $input = $request->all();
        $Order->update($input);

        Orderdetail::where('id_order', $Order['id'])->delete();

        for ($i=0; $i < count($input['id_produk']) ; $i++) {
            Orderdetail::create([
                'id_order' =>$Order['id'],
                'id_produk' =>$input['id_produk'][$i],
                'jumlah' =>$input['jumlah'][$i],
                'ukuran' =>$input['ukuran'][$i],
                'total' =>$input['total'][$i],
            ]);
           }

        return response()->json([
            'messsage'=>'success',
            'data' => $Order
        ]);
    }

    public function ubah_satus(Request $request, Order $order)
    {

       $order->update([
        'status'=> $request->status
       ]);

       return response()->json([
        'messsage'=>'success',
        'data' => $order
    ]);
    }

    public function dikondirmasi()
    {

        $Order= Order::where('status','Dikonfirmasi')->get();

        return response()->json([
            'data' => $Order
        ]);
    }
    
    public function dikemas()
    {

        $Order= Order::where('status','Dikemas')->get();

        return response()->json([
            'data' => $Order
        ]);
    } 
    
    public function dikirim()
    {

        $Order= Order::where('status','Dikirim')->get();

        return response()->json([
            'data' => $Order
        ]);
    } 
   
    public function diterima()
    {

        $Order= Order::where('status','Diterima')->get();

        return response()->json([
            'data' => $Order
        ]);
    } 
   
    public function seleasi()
    {

        $Order= Order::where('status','Selesai')->get();

        return response()->json([
            'data' => $Order
        ]);
    } 
    

    public function destroy(Order $Order)
    {

        $Order->delete();

        return response()->json([
            'messsage'=>'success deleted'
        ]);
    }
}
