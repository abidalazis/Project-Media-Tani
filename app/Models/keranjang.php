<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class keranjang extends Model
{
    protected $table = 'keranjang';
    protected $fillable = [ 'id_order', 'nama_barang', 'jumlah', 'harga', 'total'];
    
}
