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
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger(column: 'user_id')->nullable();
            $table->unsignedBigInteger(column: 'website_id')->nullable();
            $table->string(column: 'title')->nullable();
            $table->string(column: 'subtitle')->nullable();
            $table->string(column: 'btn_title_1')->nullable();
            $table->string(column: 'btn_title_2')->nullable();
            $table->string(column: 'btn_url_1')->nullable();
            $table->string(column: 'btn_url_2')->nullable();

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
        Schema::dropIfExists('banners');
    }
};