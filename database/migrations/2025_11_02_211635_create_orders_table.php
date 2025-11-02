<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            // Legacy order hash (unique)
            $table->char('hsh', 32)->nullable()->unique();

            // Link to user (no FK constraint to match legacy)
            $table->integer('user_id')->default(0);

            // Created date/time
            $table->dateTime('created_at')->useCurrent();

            // Status field (tinyint)
            $table->tinyInteger('status')->default(0);

            // Main order info
            $table->string('items', 10000)->nullable();
            $table->string('uemail', 200)->nullable();
            $table->string('uname', 200)->nullable();
            $table->string('usurname', 200)->nullable();
            $table->string('uphone', 20)->nullable();
            $table->string('address', 1000)->nullable();

            // Totals
            $table->integer('totalsum')->default(0);
            $table->integer('totalcnt')->default(0);

            // TTN and IP
            $table->string('ttn', 100)->nullable();
            $table->string('ip', 100)->nullable();

            // Indexes (exactly as legacy)
            $table->index('user_id');
            $table->index('status');
            $table->index('ttn');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
