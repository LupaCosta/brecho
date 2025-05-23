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
    Schema::create('produtos', function (Blueprint $table) {
        $table->id();
        $table->string('nome');
        $table->string('tipo'); // vestido, sapato, tênis etc
        $table->string('tamanho');
        $table->decimal('valor', 10, 2);
        $table->string('status')->default('disponivel'); // disponivel, vendido, reservado
        $table->foreignId('categoria_id')->constrained()->onDelete('cascade');
        $table->foreignId('cliente_id')->nullable()->constrained()->onDelete('set null');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produtos');
    }
};
