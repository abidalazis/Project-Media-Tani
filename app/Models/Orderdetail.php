<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'orders_details';
    protected $fillable = [ 'id_order', 'id_produk', 'jumlah', 'ukuran', 'total'];
}
