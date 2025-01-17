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
        Schema::create('hospital_counters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained(table: 'hospital_branches');
            $table->foreignId('building_id')->constrained(table: 'hospital_buildings');
            $table->foreignId('floor_id')->constrained(table: 'hospital_floors');
            $table->time('start_time')->nullable();
            $table->time('end_time')->nullable();
            $table->string('remarks')->nullable();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('hospital_counters');
    }
};
