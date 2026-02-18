<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('m_ejournal_journals', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();

            // Optional label shown on cards (e.g. "Original Research")
            $table->string('category')->nullable();

            $table->text('short_description')->nullable();
            $table->string('cover_path')->nullable();

            $table->boolean('is_featured')->default(true);
            $table->boolean('is_published')->default(true);
            $table->timestamp('published_at')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_ejournal_journals');
    }
};
