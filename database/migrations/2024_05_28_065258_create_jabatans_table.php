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
        Schema::create('jabatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_jabatan', 100);
            $table->unsignedBigInteger('id_level'); // Kolom foreign key
            $table->timestamps();

                // Definisi foreign key constraint
                $table->foreign('id_level')->references('id')->on('levels'); // Menunjukkan tabel 'levels'

                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatans');
    }
};
