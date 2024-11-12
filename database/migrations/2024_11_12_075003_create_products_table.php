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
        Schema::create('products', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->decimal('cost_price', 10, 2);
            $table->decimal('sale_price', 10, 2);
            $table->decimal('filled_weight', 10, 2)->default(0);
            $table->decimal('empty_weight', 10, 2)->default(0);
            $table->boolean('can_sell_in_vip');
            $table->boolean('can_sell_in_gate');
            $table->ulid('size_id');
            $table->ulid('category_id');
            $table->ulid('user_id');
            //
            $table->foreign('size_id')->references('id')->on('sizes');
            $table->foreign('category_id')->references('id')->on('categories');
            $table->foreign('user_id')->references('id')->on('users');
            //
            $table->timestamps();

            $table->unique(['name', 'size_id', 'category_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
