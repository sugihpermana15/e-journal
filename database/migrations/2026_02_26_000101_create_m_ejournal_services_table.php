<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('m_ejournal_services', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('button_label')->nullable();
            $table->string('icon')->nullable();
            $table->string('title');
            $table->text('text')->nullable();
            $table->string('small_label')->nullable();
            $table->string('small_sublabel')->nullable();
            $table->string('button_text')->nullable();
            $table->string('image')->nullable();

            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('sort_order')->default(0);

            $table->json('detail')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('m_ejournal_services');
    }
};
