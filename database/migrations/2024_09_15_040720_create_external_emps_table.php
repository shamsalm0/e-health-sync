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
        Schema::create('external_emps', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained(table: 'hospital_branches');
            $table->string('name')->nullable();
            $table->foreignId('designation_id')->constrained();
            $table->foreignId('department_id')->constrained();
            $table->foreignId('emp_type_id')->constrained();
            $table->string('mobile')->nullable();
            $table->string('phone')->nullable();
            $table->string('external_type')->nullable();
            $table->string('qualification')->nullable();
            $table->string('address')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('external_emps');
    }
};
