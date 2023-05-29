<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('car', function (Blueprint $table) {
            $table->id();
            $table->string("brand", 50);
            $table->string("model", 50);
            $table->integer("year", 5);
            $table->string("color", 50);
            $table->integer("km");
            $table->string("fuel");
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('car');
    }
};
