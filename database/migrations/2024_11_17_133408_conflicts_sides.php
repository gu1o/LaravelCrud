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
        Schema::create('conflict_sides', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('conflicts_id');
            $table->unsignedBigInteger('side_id');
            $table->timestamps();

            $table->foreign('conflicts_id')->references('id')->on('conflicts');
            $table->foreign('side_id')->references('id')->on('sides');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('conflicts_sides');
    }
};
