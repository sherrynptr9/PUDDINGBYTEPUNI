<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Relasi ke users
            $table->string('nama_pemesan');
            $table->string('no_wa');
            $table->text('alamat');
            $table->date('tanggal_pesan');
            $table->integer('jumlah');
            $table->foreignId('menu_id')->constrained()->onDelete('cascade'); // Relasi ke menus
            $table->enum('status', ['pending', 'konfirmasi', 'dibatalkan','selesai'])->default('pending');
            $table->enum('pengiriman', ['delivery','pickup']);
            $table->text('catatan')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
