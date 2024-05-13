<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('destinasi_wisata', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('HargaTiket')->nullable();
            $table->string('FasilitasDestinasi')->nullable();
            $table->string('JamBuka')->nullable();
            $table->text('Deskripsi')->nullable();
            $table->text('Sejarah')->nullable();
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('sampul')->nullable(); // Image field to store the image path
            $table->string('gambar')->nullable(); // Image field to store the image path
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('destinasi_wisata');
    }
};
