<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('source_id')->nullable()->unique();
            $table->foreignId('product_id')->constrained()->cascadeOnDelete();
            $table->string('reviewer');
            $table->text('review')->nullable();
            $table->longText('review_html')->nullable();
            $table->unsignedTinyInteger('rating')->default(5);
            $table->boolean('verified')->default(false);
            $table->boolean('approved')->default(true);
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
