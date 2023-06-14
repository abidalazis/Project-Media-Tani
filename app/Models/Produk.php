<?php

namespace App\Models;

use App\Models\Kategori;
use App\Models\Subkategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $guarded = [];
    protected $fillable = [
        'id_kategori',
            'id_subkategori',
            'nama_barang',
            'deskripsi',
            'harga',
            'diskon',
            'bahan',
            'ukuran',
            'gambar' ,
    ];
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori', 'id');
    }
    public function subkategori()
    {
        return $this->belongsTo(Subkategori::class,'id_subkategori', 'id');
    }
}
