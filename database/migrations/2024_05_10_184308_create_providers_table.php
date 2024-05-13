<?php
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */
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
        Schema::create('providers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('providers');
    }
};
/***
 * Jhonatan Samuel Martinez Hernandez
 * Software Analyts and Developer
 * code 2675859
 * SENA 
 * Year 2024
 */