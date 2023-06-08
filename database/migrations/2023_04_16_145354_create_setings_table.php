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
        Schema::create('setings', function (Blueprint $table) {
            $table->id();
            $table->string('logowebsite')->nullable();
            $table->string('deskripsiwebsite');
            $table->string('email');
            $table->string('notelepon');
            $table->string('alamat');
            $table->string('ig');
            $table->string('facebook');
            $table->string('twitter');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('setings');
    }
};
