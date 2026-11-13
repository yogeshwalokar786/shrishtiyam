<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->string('meta_keywords', 500)->nullable()->after('meta_description');
            $table->string('canonical_url', 500)->nullable()->after('meta_keywords');
            $table->string('og_title', 255)->nullable()->after('canonical_url');
            $table->text('og_description')->nullable()->after('og_title');
            $table->string('og_image', 500)->nullable()->after('og_description');
            $table->string('schema_type', 50)->default('Article')->after('og_image');
            $table->string('robots_index', 20)->default('index')->after('schema_type');
            $table->string('robots_follow', 20)->default('follow')->after('robots_index');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropColumn([
                'meta_keywords',
                'canonical_url',
                'og_title',
                'og_description',
                'og_image',
                'schema_type',
                'robots_index',
                'robots_follow',
            ]);
        });
    }
};
