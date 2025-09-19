<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->renameColumn('bedrooms', 'cabins');
            $table->enum('work_station', ['Modular', 'Normal'])->default('Normal')->after('cabins');
        });
    }

    public function down(): void
    {
        Schema::table('properties', function (Blueprint $table) {
            $table->dropColumn('work_station');
            $table->renameColumn('cabins', 'bedrooms');
        });
    }
};