<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('candidaturas', function (Blueprint $table) {
            $table->id();
            $table->String('name');
            $table->unsignedBigInteger('candidatoid');
            $table->unsignedBigInteger('vagaid');
            $table->binary('curriculo'); 
            $table->timestamps();
        });
         DB::statement('ALTER TABLE candidaturas MODIFY curriculo MEDIUMBLOB');
    }
    public function down(): void
    {
        Schema::dropIfExists('candidaturas');
    }
};
