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
            $table->id();
            $table->unsignedBigInteger(column: 'user_id')->nullable();
            $table->unsignedBigInteger(column: 'website_id')->nullable();
            $table->bigInteger('product_group_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->float('price')->nullable();
            $table->float('discount_price')->nullable();
            $table->integer('present_stock')->default(0);
            $table->integer('total_sold')->default(0);
            $table->integer('total_purchase')->default(0);
            $table->string('image')->nullable();

            $table->bigInteger('creator')->unsigned()->nullable();
            $table->string('slug', 50)->nullable();
            $table->tinyInteger('status')->unsigned()->default(1);
            $table->timestamps();
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
