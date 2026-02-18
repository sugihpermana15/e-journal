<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->string('detail_gallery_image_1_path')->nullable()->after('content');
            $table->string('detail_gallery_image_2_path')->nullable()->after('detail_gallery_image_1_path');

            $table->string('detail_title_2')->nullable()->after('detail_gallery_image_2_path');
            $table->text('detail_text_2')->nullable()->after('detail_title_2');
            $table->text('detail_text_3')->nullable()->after('detail_text_2');
            $table->text('detail_text_4')->nullable()->after('detail_text_3');

            $table->string('detail_title_3')->nullable()->after('detail_text_4');
            $table->json('detail_points')->nullable()->after('detail_title_3');

            $table->string('detail_title_4')->nullable()->after('detail_points');
            $table->text('detail_text_5')->nullable()->after('detail_title_4');

            $table->text('detail_quote_text')->nullable()->after('detail_text_5');
            $table->string('detail_quote_author_name')->nullable()->after('detail_quote_text');
            $table->string('detail_quote_author_image_path')->nullable()->after('detail_quote_author_name');

            $table->string('detail_title_5')->nullable()->after('detail_quote_author_image_path');
            $table->text('detail_text_6')->nullable()->after('detail_title_5');

            $table->string('detail_feature_image_path')->nullable()->after('detail_text_6');
            $table->json('detail_feature_points')->nullable()->after('detail_feature_image_path');

            $table->text('detail_text_7')->nullable()->after('detail_feature_points');

            $table->string('share_pinterest_url')->nullable()->after('detail_text_7');
            $table->string('share_linkedin_url')->nullable()->after('share_pinterest_url');
            $table->string('share_instagram_url')->nullable()->after('share_linkedin_url');
            $table->string('share_facebook_url')->nullable()->after('share_instagram_url');
        });
    }

    public function down(): void
    {
        Schema::table('blog_posts', function (Blueprint $table) {
            $table->dropColumn([
                'detail_gallery_image_1_path',
                'detail_gallery_image_2_path',
                'detail_title_2',
                'detail_text_2',
                'detail_text_3',
                'detail_text_4',
                'detail_title_3',
                'detail_points',
                'detail_title_4',
                'detail_text_5',
                'detail_quote_text',
                'detail_quote_author_name',
                'detail_quote_author_image_path',
                'detail_title_5',
                'detail_text_6',
                'detail_feature_image_path',
                'detail_feature_points',
                'detail_text_7',
                'share_pinterest_url',
                'share_linkedin_url',
                'share_instagram_url',
                'share_facebook_url',
            ]);
        });
    }
};
