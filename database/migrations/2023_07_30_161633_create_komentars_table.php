<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// 2023_07_30_093314_create_komentars_table.php

class CreateKomentarsTable extends Migration
{
    public function up()
    {
        Schema::create('komentars', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->text('isi_komentar')->nullable();
            $table->unsignedBigInteger('destinasi_wisata_id')->nullable();
            $table->unsignedBigInteger('destinasi_kuliner_id')->nullable();
            $table->unsignedBigInteger('destinasi_hotel_id')->nullable(); // Tambahkan kolom destinasi_hotel_id
            $table->unsignedBigInteger('kebudayaan_id')->nullable(); // Tambahkan kolom destinasi_hotel_id
            $table->integer('rating')->nullable();
            $table->timestamps();

            $table->foreign('destinasi_wisata_id')
                ->references('id')
                ->on('destinasi_wisata')
                ->onDelete('cascade');

            $table->foreign('destinasi_kuliner_id')
                ->references('id')
                ->on('destinasi_kuliner')
                ->onDelete('cascade');

            $table->foreign('destinasi_hotel_id') // Tambahkan foreign key untuk destinasi_hotel
                ->references('id')
                ->on('destinasi_hotel')
                ->onDelete('cascade');

            $table->foreign('kebudayaan_id') // Tambahkan foreign key untuk destinasi_hotel
                ->references('id')
                ->on('kebudayaan')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('komentars');
    }
}

