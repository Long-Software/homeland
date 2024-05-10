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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->float('price');
            $table->string('img_url');
            $table->integer('beds');
            $table->integer('baths');
            $table->string('sqaure_foot');
            $table->string('house_type');
            $table->string('year_built');
            $table->string('price_per_square');
            $table->string('info');
            $table->string('length');
            $table->string('address');
            $table->string('agent_name');
            $table->string('type');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
