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
        Schema::create('tintas', function (Blueprint $table) {
            $table->id();
            $table->biginteger('codigo')->unique();
            $table->string('marca', 200)->nullable();
            $table->string('cor', 30)->nullable();
            $table->integer('quantidade');
            $table->string('capacidade');
            $table->unsignedBigInteger('fornecedor_id')->nullable();

            $table->foreign('fornecedor_id')->references('id')->on('fornecedores')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tintas');
    }
};
