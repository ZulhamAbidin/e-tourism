<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestinasiHotelTable extends Migration
{
    public function up()
    {
        Schema::create('destinasi_hotel', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('alamat');
            $table->string('JamBuka')->nullable();
            $table->text('Deskripsi')->nullable();
            $table->float('latitude', 10, 6);
            $table->float('longitude', 10, 6);
            $table->string('sampul')->nullable();
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('destinasi_hotel');
    }
}
