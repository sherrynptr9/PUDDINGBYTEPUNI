<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

        protected $fillable = [
            'nama_pemesan',
            'no_wa',
            'alamat',
            'tanggal_pesan',
            'jumlah',
            'menu_id',
            'status',
            'user_id',
            'pengiriman',
            'catatan',
        ];



    public function menu()
    {
        return $this->belongsTo(Menu::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
