<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('parent_source_id')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('permalink')->nullable();
            $table->unsignedInteger('product_count')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
