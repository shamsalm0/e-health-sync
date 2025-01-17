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
        Schema::create('emp_addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained(table: 'emp_infos');
            $table->foreignId('c_division_id')->constrained(table: 'divisions');
            $table->foreignId('c_district_id')->constrained(table: 'districts');
            $table->foreignId('c_upazila_id')->constrained(table: 'upazilas');
            $table->string('c_post_office')->nullable();
            $table->string('c_post_code')->nullable();
            $table->string('c_address')->nullable();
            $table->string('c_mobile')->nullable();
            $table->foreignId('p_division_id')->constrained(table: 'divisions');
            $table->foreignId('p_district_id')->constrained(table: 'districts');
            $table->foreignId('p_upazila_id')->constrained(table: 'upazilas');
            $table->string('p_post_office')->nullable();
            $table->string('p_post_code')->nullable();
            $table->string('p_address')->nullable();
            $table->string('p_mobile')->nullable();
            $table->enum('mailing_address', ['Present_address', 'Permanent_address']);
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
        Schema::dropIfExists('emp_addresses');
    }
};
