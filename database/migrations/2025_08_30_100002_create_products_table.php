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
            $table->unsignedBigInteger('source_id')->unique();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('sku')->nullable();
            $table->string('type')->nullable();
            $table->text('short_description')->nullable();
            $table->longText('short_description_html')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_html')->nullable();
            $table->boolean('on_sale')->default(false);
            $table->decimal('price', 12, 2)->nullable();
            $table->decimal('regular_price', 12, 2)->nullable();
            $table->decimal('sale_price', 12, 2)->nullable();
            $table->string('currency', 8)->nullable();
            $table->decimal('average_rating', 3, 2)->nullable();
            $table->unsignedInteger('review_count')->default(0);
            $table->boolean('is_in_stock')->default(true);
            $table->boolean('is_purchasable')->default(true);
            $table->string('stock_availability')->nullable();
            $table->unsignedInteger('low_stock_remaining')->nullable();
            $table->string('weight')->nullable();
            $table->json('dimensions')->nullable();
            $table->json('brands')->nullable();
            $table->json('tags')->nullable();
            $table->json('attributes')->nullable();
            $table->string('permalink')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
