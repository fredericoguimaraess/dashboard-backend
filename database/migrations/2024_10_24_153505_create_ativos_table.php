<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ativos', function (Blueprint $table) {
            $table->id();
            $table->string('ticket');
            $table->date('data_compra')->nullable();
            $table->date('data_venda')->nullable();
            $table->integer('quantidade');
            $table->decimal('cotacao', 10, 2);
            $table->string('tipo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ativos');
    }
};
