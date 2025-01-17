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
        Schema::create('emp_infos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father')->nullable();
            $table->string('mother')->nullable();
            $table->string('dob')->nullable();
            $table->foreignId('gender_id')->constrained();
            $table->foreignId('blood_group_id')->constrained(table: 'blood_groups');
            $table->foreignId('marital_status_id')->constrained(table: 'marital_statuses');
            $table->foreignId('religion_id')->constrained();
            $table->string('nid')->nullable();
            $table->string('emp_id')->nullable();
            $table->foreignId('emp_type_id')->constrained();
            $table->enum('job_nature', ['Full Time', 'Part Time', 'Contructual'])->default('Full Time');
            $table->foreignId('department_id')->constrained();
            $table->foreignId('designation_id')->constrained();
            $table->foreignId('grade_id')->constrained();
            $table->date('joining_date')->nullable();
            $table->date('confirmation_date')->nullable();
            $table->string('driving_lisence_no')->nullable();
            $table->string('qualification')->nullable();
            $table->string('photo')->nullable();
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
        Schema::dropIfExists('emp_infos');
    }
};
