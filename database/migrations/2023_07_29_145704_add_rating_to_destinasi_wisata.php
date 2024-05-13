<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
        $table->decimal('rating', 3, 2)->default(0);
         });
    }

    public function down()
    {
        Schema::table('destinasi_wisata', function (Blueprint $table) {
            $table->dropColumn('rating');
        });
    }
};
