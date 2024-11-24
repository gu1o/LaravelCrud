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
        Schema::create('armies_involved', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('side', ["Republic","Empire","Separatist","Rebels Alliance","First Order","Resistance","Mandalorians","Crime Cartels","Citizens and Local Militias"]);
            $table->string('comander');
            $table->timestamps();
            $table->unsignedBigInteger('conflicts_id');
            $table->unsignedBigInteger('sides_id');
            $table->foreign('conflicts_id')->references('id')->on('conflicts');
            $table->foreign('sides_id')->references('id')->on('sides');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('armies_involved');
    }
};
