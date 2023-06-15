<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pesanan extends Model
{
    protected $table = 'pesanan';
    protected $fillable = [ 'id_order', 'total'];

    public function pesanan_detail()
    {
        return $this->hasMany(pesanan_detail::class);
    }
}
