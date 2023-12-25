<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use function Webmozart\Assert\Tests\StaticAnalysis\string;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('elves', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ip', 45)->nullable();
            $table->string('user_agent')->nullable();
            $table->string('method', 10)->nullable();
            $table->text('url')->nullable();
            $table->text('full_url')->nullable();
            $table->text('referrer')->nullable();
            $table->string('path')->nullable();
            $table->string('host')->nullable();
            $table->integer('port')->nullable();
            $table->string('locale', 10)->nullable();
            $table->string('language', 10)->nullable();
            $table->boolean('is_secure')->nullable();
            $table->boolean('is_ajax')->nullable();
            $table->string('content_type')->nullable();
            $table->json('session_data')->nullable();
            $table->json('cookies')->nullable();
            $table->json('headers')->nullable();
            $table->integer('attempts');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elves');
    }
};
