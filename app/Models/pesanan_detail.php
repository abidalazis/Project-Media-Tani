<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan_detail extends Model
{
    protected $table = 'pesanan_detail';
    protected $fillable = [ 'id_order', 'nama_barang', 'jumlah', 'harga', 'total'];
    public function pesanan()
    {
        return $this->belongsTo(pesanan::class,'id_pesanan', 'id');
    }
}
