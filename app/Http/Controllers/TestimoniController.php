<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class TestimoniController extends Controller
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
       $testimoni= Testimoni::all();

        return response()->json([
            'data' => $testimoni
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
            'nama_testimoni' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpg,png,jpeg,webp',

        ]);
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(), 422
            );
        }

        $input = $request->all();

        if ($request->has('gambar')) {
            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads/testimoni', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }

       $testimoni = Testimoni::create($input);
        return response()->json([
            'data'=> $testimoni
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function show(Testimoni $Testimoni)
    {
        return response()->json([
            'data'=> $Testimoni
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function edit(Testimoni $Testimoni)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Testimoni $testimoni)
    {
        $validator = FacadesValidator::make($request->all(), [
            'nama_testimoni' => 'required',
            'deskripsi' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(), 422
            );
        }

        $input = $request->all();

        if ($request->has('gambar')) {
            File::delete('uploads/testimoni/' . $testimoni->gambar);

            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads/testimoni', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        } else {
            unset($input['gambar']);
        }


        $testimoni->update($input);

        return response()->json([
            'messsage'=>'success',
            'data' => $testimoni
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Testimoni  $Testimoni
     * @return \Illuminate\Http\Response
     */
    public function destroy(Testimoni $testimoni)
    {
        File::delete('uploads/testimoni/' . $testimoni->gambar);
        $testimoni->delete();

        return response()->json([
            'messsage'=>'success deleted'
        ]);
    }
}
