<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sale extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pembeli',
        'tanggal_penjualan',
        'total_item',
        'total_pendapatan',
    ];
}
