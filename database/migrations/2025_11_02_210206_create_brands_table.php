<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('brands', function (Blueprint $table) {
            $table->id();                           // INT AUTO_INCREMENT (bigint unsigned in Laravel)
            $table->string('title', 300);           // keep length 300 as in legacy
            $table->boolean('is_published')->default(false);

            // Simple index on is_published (OK for all MySQL versions)
            $table->index('is_published');
        });

        // Create prefix index for `title` to avoid "max key length 1000 bytes" on utf8mb4
        DB::statement('CREATE INDEX brands_title_index ON brands (title(191))');
    }

    public function down(): void
    {
        // Drop prefix index explicitly before dropping table
        try {
            DB::statement('DROP INDEX brands_title_index ON brands');
        } catch (\Throwable $e) {
            // ignore if it does not exist
        }

        Schema::dropIfExists('brands');
    }
};
