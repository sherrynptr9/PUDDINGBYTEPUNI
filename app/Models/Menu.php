<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'deskripsi',
        'harga',
        'gambar',
        'is_favorit',
        'is_available',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
