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
        Schema::create('fractions', function (Blueprint $table) {
            $table->id();
            $table->string('location'); // Localização (ex: Apt 101, Loja 01, etc)
            $table->decimal('fraction', 10, 6); // Fração ideal (ex: 0.025000)
            $table->string('type'); // Tipo (apartamento, loja, garagem, etc)
            $table->timestamps();
            
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fractions');
    }
};
