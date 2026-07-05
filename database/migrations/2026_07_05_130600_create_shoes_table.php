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
    Schema::create('shoes', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('brand');
        $table->integer('price');
        $table->integer('stock');
        $table->string('image')->nullable(); // Untuk menyimpan nama file foto sepatu
        $table->text('description')->nullable();
        $table->timestamps();
    });
}
};
