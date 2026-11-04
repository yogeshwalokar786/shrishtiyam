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
        if (!Schema::hasTable('job_openings')) {
            Schema::create('job_openings', function (Blueprint $table) {
                $table->id();
                $table->string('title');
                $table->string('slug')->unique();
                $table->string('department')->nullable();
                $table->string('location')->default('Nagpur HQ');
                $table->string('employment_type')->default('Full-time');
                $table->string('experience')->nullable();
                $table->text('overview')->nullable();
                $table->longText('description')->nullable();
                $table->string('icon_type')->default('shield');
                $table->string('badge_text')->nullable();
                $table->boolean('is_active')->default(true);
                $table->integer('sort_order')->default(0);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_openings');
    }
};

