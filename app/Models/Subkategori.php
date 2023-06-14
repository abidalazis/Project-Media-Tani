<?php

namespace App\Models;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subkategori extends Model
{
    use HasFactory;
    protected $guard = ['id'];
    protected $fillable = [
        'nama_subkategori',
        'deskripsi',
        'gambar',
        'id_kategori'
    ];
    
    public function kategori()
    {
        return $this->belongsTo(Kategori::class,'id_kategori', 'id');
    }

    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
