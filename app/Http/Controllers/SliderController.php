<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator as FacadesValidator;

class SliderController extends Controller
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
       $slider= Slider::all();

        return response()->json([
            'data' => $slider
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
            'nama_slider' => 'required',
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
            $gambar->move('uploads/slider', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        }

       $slider = Slider::create($input);
        return response()->json([
            'data'=> $slider
        ]);
    }


    public function show(Slider $slider)
    {
        //
    }


    public function update(Request $request, Slider $slider)
    {
        $validator = FacadesValidator::make($request->all(), [
            'nama_slider' => 'required',
            'deskripsi' => 'required',

        ]);
        if ($validator->fails()) {
            return response()->json(
                $validator->errors(), 422
            );
        }

        $input = $request->all();

        if ($request->has('gambar')) {
            File::delete('uploads/slider/' . $slider->gambar);

            $gambar =$request->file('gambar');
            $nama_gambar = time() . rand(1,9) . '.' . $gambar->getClientOriginalExtension();
            $gambar->move('uploads/slider', $nama_gambar);
            $input['gambar'] = $nama_gambar;
        } else {
            unset($input['gambar']);
        }


        $slider->update($input);

        return response()->json([
            'messsage'=>'success',
            'data' => $slider
        ]);
    }


    public function destroy(Slider $slider)
    {
        File::delete('uploads/slider/' . $slider->gambar);
        $slider->delete();

        return response()->json([
            'messsage'=>'success deleted'
        ]);
    }
}
