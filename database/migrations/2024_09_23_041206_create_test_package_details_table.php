<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('test_package_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('package_id')->constrained('test_packages');
            $table->foreignId('test_name_id')->constrained('test_names');
            $table->decimal('price', 10, 2);
            $table->decimal('commission', 10, 2)->nullable();

            $table->boolean('status')->default(1)->comment('0 - inactive, 1 - active');
            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('test_package_details');
    }
};
