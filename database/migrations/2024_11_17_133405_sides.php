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
        Schema::create('sides', function (Blueprint $table) {
            $table->id();
            $table->string('side_name')->unique();
            $table->text('description') -> nullable();
            $table->string('symbol') -> nullable();
            $table->date('founded_date') -> nullable();
            $table->date('dissolution_date') -> nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sides');
    }
};