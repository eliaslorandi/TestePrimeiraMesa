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
        $table->string('nome');
        $table->string('numero_celular');
        $table->string('email')->nullable();
        $table->text('nota')->nullable();
        $table->timestamps();
    }); 

    Schema::create('enderecos', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('contato_id');
        $table->string('cep')->nullable();
        $table->string('rua')->nullable();
        $table->integer('numero')->nullable();
        $table->string('complemento')->nullable();
        $table->string('bairro')->nullable();
        $table->string('cidade')->nullable();
        $table->string('estado')->nullable();
        $table->timestamps();

        $table->foreign('contato_id')->references('id')->on('contatos')->onDelete('cascade');
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
