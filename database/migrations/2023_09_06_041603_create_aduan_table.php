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
        Schema::create('aduan', function (Blueprint $table) {
            $table->id();
            $table->string('no_tiket');
            $table->string('nama_pengadu');
            $table->string('email_pengadu');
            $table->string('telefon_pengadu')->nullable();
            $table->string('jenis_aduan');
            $table->jsonb('maklumat_aduan');
            $table->string('status_aduan', 20)->default('baru');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aduan');
    }
};
