<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('barang_masuks', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->nullable();
            $table->string('supplier_id')->nullable();
            $table->string('kode_barang')->nullable();
            $table->integer('jumlah')->nullable();
            $table->dateTime('tanggal_terima')->nullable();
            $table->string('satuan')->nullable();
            $table->string('harga_satuan')->nullable();
            $table->string('total_harga')->nullable();
            $table->string('lokasi_gudang')->nullable();
            $table->string('diterima_oleh')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('dibuat_oleh')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang_masuks');
    }
};
