<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('vagas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id();
            $table->string('name');
            $table->integer('quantidade');
            $table->string('tipo');
            $table->text('descrição');
            $table->string('empresa');
            $table->decimal('salario');
            $table->boolean('status')->default(true);;
            $table->unsignedBigInteger('recrutadorid');
            $table->timestamps();


            $table->foreign('recrutadorid')->references('id')->on('usuarios')->onDelete('cascade');
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
