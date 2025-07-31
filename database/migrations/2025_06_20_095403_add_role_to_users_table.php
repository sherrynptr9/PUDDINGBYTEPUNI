<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('telepon', 20)->nullable()->after('email');
            $table->text('alamat')->nullable()->after('telepon');
            $table->string('role')->default('user')->after('alamat'); // Tambahkan kolom role
        });
    }

    /**
     * Kembalikan migrasi.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['telepon', 'alamat', 'role']); // Hapus kolom role juga
        });
    }
};