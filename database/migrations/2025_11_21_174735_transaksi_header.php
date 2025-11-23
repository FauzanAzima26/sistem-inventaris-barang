<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksi_header', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->string('kode_transaksi');
            $table->enum('jenis_transaksi',['masuk', 'keluar']);
            $table->timestamp('tgl_transaksi');
            $table->int('total_item');
            $table->text('keterangan');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
