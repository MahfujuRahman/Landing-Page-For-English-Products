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
        Schema::create('order_visitors', function (Blueprint $table) {
            $table->id();
            $table->text('ip');
            $table->dateTime('date');
            $table->bigInteger('count')->default(1);
            $table->bigInteger('buy')->default(0);
            $table->float('lat')->unsigned()->nullable();
            $table->float('lon')->unsigned()->nullable();
            $table->text('url')->nullable();
            $table->string('city', 150)->nullable();
            $table->string('region', 150)->nullable();
            $table->string('country', 150)->nullable();
            $table->string('ip_location', 150)->nullable();
            $table->string('org', 150)->nullable();
            $table->string('postal', 150)->nullable();
            $table->string('timezone', 150)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_visitors');
    }
};
