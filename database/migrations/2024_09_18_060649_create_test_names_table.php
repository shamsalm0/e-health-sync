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
        Schema::create('test_names', function (Blueprint $table) {
            $table->id();
            $table->foreignId('test_group_id')->constrained();
            $table->string('name');
            $table->string('cost')->nullable();
            $table->foreignId('department_id')->constrained();
            $table->boolean('is_sample')->default(0);
            $table->foreignId('lab_room_id')->constrained(table: 'hospital_rooms');
            $table->foreignId('sample_room_id')->constrained(table: 'hospital_rooms');
            $table->integer('delivery_time')->nullable();
            $table->foreignId('report_type_id')->constrained();
            $table->boolean('is_level_print')->default(0);
            $table->boolean('is_ticket_show')->default(0);
            $table->boolean('is_discount')->default(0);
            $table->boolean('is_attribute_group')->default(0);
            $table->boolean('is_title_show')->default(0);
            $table->boolean('is_unit_show')->default(0);
            $table->boolean('is_normal_unit')->default(0);
            $table->boolean('is_normal_no_unit')->default(0);
            $table->boolean('is_dialysis')->default(0);
            $table->boolean('is_physiotherapy')->default(0);
            $table->boolean('is_test')->default(0);
            $table->string('free_amount')->nullable();
            $table->foreignId('uom_id')->constrained(table: 'uoms');
            $table->string('comment')->nullable();
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
        Schema::dropIfExists('test_names');
    }
};
