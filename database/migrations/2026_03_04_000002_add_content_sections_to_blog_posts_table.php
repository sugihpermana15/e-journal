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
            if (!Schema::hasColumn('blog_posts', 'content_sections')) {
                $table->json('content_sections')->nullable()->after('content');
            }
        });
    }

    public function down(): void
    {
        if (!Schema::hasTable('blog_posts')) {
            return;
        }

        Schema::table('blog_posts', function (Blueprint $table) {
            if (Schema::hasColumn('blog_posts', 'content_sections')) {
                $table->dropColumn('content_sections');
            }
        });
    }
};
