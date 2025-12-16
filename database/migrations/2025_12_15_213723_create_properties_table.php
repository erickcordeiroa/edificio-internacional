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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('location'); // Endereço/Localização
            $table->string('responsible_person')->nullable(); // Pessoa responsável
            $table->string('contact'); // Contato principal
            $table->string('whatsapp_contact')->nullable(); // WhatsApp
            $table->enum('type', ['SALE', 'RENT'])->default('SALE'); // Venda ou Aluguel
            $table->decimal('price', 10, 2); // Preço
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('location');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
