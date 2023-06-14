<?php

namespace App\Models;

use App\Models\Subkategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kategori extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_kategori',
        'deskripsi',
        'gambar'
    ];
    public function subkategori()
    {
        return $this->hasMany(Subkategori::class);
    }
}
