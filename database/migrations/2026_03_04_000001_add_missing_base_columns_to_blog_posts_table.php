<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasTable('blog_posts')) {
            return;
        }

        Schema::table('blog_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('blog_posts', 'category')) {
                $table->string('category')->nullable();
            }

            if (!Schema::hasColumn('blog_posts', 'tags')) {
                $table->json('tags')->nullable();
            }

            if (!Schema::hasColumn('blog_posts', 'author_name')) {
                $table->string('author_name')->nullable();
            }

            if (!Schema::hasColumn('blog_posts', 'author_image_path')) {
                $table->string('author_image_path')->nullable();
            }

            if (!Schema::hasColumn('blog_posts', 'hero_image_path')) {
                $table->string('hero_image_path')->nullable();
            }

            if (!Schema::hasColumn('blog_posts', 'created_by')) {
                $table->foreignId('created_by')->nullable()->constrained('users')->nullOnDelete();
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('blog_posts')) {
            return;
        }

        Schema::table('blog_posts', function (Blueprint $table) {
            if (Schema::hasColumn('blog_posts', 'created_by')) {
                $table->dropConstrainedForeignId('created_by');
            }

            $columnsToDrop = [];

            foreach (['hero_image_path', 'author_image_path', 'author_name', 'tags', 'category'] as $column) {
                if (Schema::hasColumn('blog_posts', $column)) {
                    $columnsToDrop[] = $column;
                }
            }

            if ($columnsToDrop !== []) {
                $table->dropColumn($columnsToDrop);
            }
        });
    }
};
