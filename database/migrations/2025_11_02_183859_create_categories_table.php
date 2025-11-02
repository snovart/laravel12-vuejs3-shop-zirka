<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id();

            // Parent category (self relation for hierarchy)
            $table->foreignId('parent_id')->nullable()->constrained('categories')->nullOnDelete();

            // Slug for SEO-friendly URLs (regular index instead of unique)
            $table->string('slug')->index();

            // Category title
            $table->string('title');

            // Optional description text
            $table->text('description')->nullable();

            // Sorting order
            $table->unsignedInteger('sort_order')->default(0);

            // Visibility flag
            $table->boolean('is_active')->default(true);

            // SEO metadata fields
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 512)->nullable();

            // Default timestamps and soft delete
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
