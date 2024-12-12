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
        Schema::create('order_sheets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id')->nullable();
            $table->unsignedBigInteger(column: 'website_id')->nullable();

            $table->string('full_name', 200)->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->text('address')->nullable();
            $table->float('order_total')->nullable();
            $table->float('global_discount_amount')->nullable();
            $table->float('global_discount')->nullable();
            $table->string('coupon', 20)->nullable();
            $table->float('coupon_discount_amount')->nullable();
            $table->float('coupon_discount')->nullable();
            $table->string('shipping_area', 20)->nullable();
            $table->bigInteger('shipping_charge')->nullable();
            $table->float('grand_total')->nullable();
            $table->longText('product_details')->nullable();

            $table->string('delivery_status', 20)->default('pending');

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
        Schema::dropIfExists('order_sheets');
    }
};