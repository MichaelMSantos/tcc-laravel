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
        Schema::create('tintas', function (Blueprint $table) {
            $table->biginteger('codigo')->primary();
            $table->string('marca', 200)->nullable();
            $table->integer('quantidade');
            $table->string('capacidade');
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
