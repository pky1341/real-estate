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
            $table->text('description');
            $table->decimal('price', 12, 2);
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->integer('bedrooms');
            $table->integer('bathrooms');
            $table->integer('area'); // in sq ft
            $table->foreignId('property_type_id')->constrained();
            $table->enum('status', ['available', 'sold', 'rented'])->default('available');
            $table->boolean('featured')->default(false);
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
