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
        Schema::create('resources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained(table: 'hospital_branches');
            $table->string('resource_type')->nullable();
            $table->string('name');
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('dob')->nullable();
            $table->string('personal_mobile')->nullable();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('nid')->nullable();
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('c_district_id')->constrained(table: 'districts');
            $table->foreignId('c_upazila_id')->constrained(table: 'upazilas');
            $table->string('c_address')->nullable();
            $table->foreignId('p_district_id')->constrained(table: 'districts');
            $table->foreignId('p_upazila_id')->constrained(table: 'upazilas');
            $table->string('p_address')->nullable();
            $table->foreignId('blood_group_id')->constrained();
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
        Schema::dropIfExists('resources');
    }
};
