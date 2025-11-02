<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('tovars', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT

            // Columns mapped from legacy `tovar` table
            $table->string('title', 200);
            $table->string('slug', 200);
            $table->integer('category_id');                 // keep as INT(11), no FK (to match legacy)
            $table->unsignedInteger('brand_id')->default(0); // UNSIGNED, DEFAULT 0
            $table->string('img', 5000)->nullable();
            $table->string('video', 5000)->nullable();
            $table->integer('price')->default(0);
            $table->text('descr')->nullable();
            $table->boolean('is_published')->default(false);
            $table->string('code', 200)->nullable();
            $table->unsignedTinyInteger('material')->default(0);
            $table->integer('cnt')->default(0);

            // Only created_at, just like legacy (no updated_at)
            $table->timestamp('created_at')->useCurrent();

            // Indexes exactly as in legacy schema
            $table->index('material');
            $table->index('code');
            $table->index('brand_id');
            $table->index('slug'); // BTREE by default
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tovars');
    }
};
