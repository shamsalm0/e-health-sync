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
        Schema::create('references', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained(table: 'hospital_branches');
            $table->string('name');
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->foreignId('district_id')->constrained();
            $table->foreignId('upazila_id')->constrained();
            $table->string('address')->nullable();
            $table->string('reference_type')->nullable();
            $table->string('qualification')->nullable();
            $table->foreignId('department_id')->constrained();
            $table->boolean('is_surgeon')->default(0)->comment('0 - false, 1 - true');
            $table->boolean('is_anesthesia')->default(0)->comment('0 - false, 1 - true');
            $table->boolean('is_consultant')->default(0)->comment('0 - false, 1 - true');
            $table->boolean('is_ultrasonogram')->default(0)->comment('0 - false, 1 - true');
            $table->boolean('is_report_doctor')->default(0)->comment('0 - false, 1 - true');
            $table->boolean('status')->default(1)->comment('0 - inactive, 1 - active');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('references');
    }
};
