<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('petitions', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->text('note')->nullable();
            $table->ulid('user_id');
            $table->ulid('from_location_id');
            $table->ulid('to_location_id');
            $table->enum('status', ['pendiente', 'completado', 'cancelado'])->default('pendiente');

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('from_location_id')->references('id')->on('locations');
            $table->foreign('to_location_id')->references('id')->on('locations');

            $table->timestamps();
        });

        DB::statement('ALTER TABLE petitions ADD CONSTRAINT check_request_locations CHECK (from_location_id <> to_location_id)');
    }

    public function down(): void
    {
        Schema::dropIfExists('petitions');
    }
};
