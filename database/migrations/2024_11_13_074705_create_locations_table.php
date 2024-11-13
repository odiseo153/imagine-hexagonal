<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name')->unique();
            $table->enum('type', ['barra', 'office', 'puerta', 'general'])->default('general');
            $table->ulid('user_id');
            $table->ulid('user_in_charge_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('user_in_charge_id')->references('id')->on('users');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('locations');
    }
};
