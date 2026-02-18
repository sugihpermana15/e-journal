<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('blog_categories')) {
            return;
        }

        if (Schema::hasColumn('blog_categories', 'is_active')) {
            return;
        }

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->boolean('is_active')->default(true)->after('slug');
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('blog_categories')) {
            return;
        }

        if (!Schema::hasColumn('blog_categories', 'is_active')) {
            return;
        }

        Schema::table('blog_categories', function (Blueprint $table) {
            $table->dropColumn('is_active');
        });
    }
};
