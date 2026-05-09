<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('name', 256);
            $table->text('description')->nullable();
            $table->string('image', 2048)->nullable();
            $table->string('model')->nullable();
            $table->integer('year')->nullable();
            $table->decimal('price', 15, 2);
            $table->boolean('is_featured')->default(false);
            $table->json('technical_specs')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
