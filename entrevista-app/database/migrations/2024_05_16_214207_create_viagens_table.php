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
        Schema::create('viagens', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('id_veiculo');
            $table->foreign('id_veiculo')->references('id')->on('veiculos')->onDelete('cascade');
            $table->integer('km_i_viagem');
            $table->integer('km_f_viagem')->nullable();
            $table->uuid('id_motorista');
            $table->foreign('id_motorista')->references('id')->on('motoristas')->onDelete('cascade');
            $table->uuid('id_motorista_2')->nullable();
            $table->foreign('id_motorista_2')->references('id')->on('motoristas')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viagens');
    }
};
