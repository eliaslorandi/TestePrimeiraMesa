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
    Schema::create('contatos', function (Blueprint $table) {
        $table->id();
        $table->string('nome')->default('')->nullable(false);
        $table->string('numero_celular')->default('')->nullable(false);
        $table->string('email')->nullable();
        $table->text('nota')->nullable();
        $table->timestamps();
    }); 
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contatos');
    }
};
