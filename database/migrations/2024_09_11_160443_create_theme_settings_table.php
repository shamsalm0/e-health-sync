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
        Schema::create('theme_settings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable()->index();
            $table->string('layout', 25)->nullable();
            $table->string('color_scheme', 25)->nullable();
            $table->string('sidebar_visibility', 25)->nullable();
            $table->string('layout_width', 25)->nullable();
            $table->string('layout_position', 25)->nullable();
            $table->string('topbar_color', 25)->nullable();
            $table->string('sidebar_size', 25)->nullable();
            $table->string('sidebar_view', 25)->nullable();
            $table->string('sidebar_color', 25)->nullable();
            $table->string('sidebar_image', 25)->nullable();
            $table->string('preloader', 25)->nullable();

            $table->boolean('status')->default(1)->comment('0:  inactive, 1: active');
            $table->unsignedBigInteger('created_by')->index()->nullable();
            $table->unsignedBigInteger('updated_by')->index()->nullable();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('theme_settings');
    }
};
