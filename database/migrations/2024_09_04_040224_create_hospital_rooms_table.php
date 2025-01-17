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
        Schema::create('hospital_rooms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('branch_id')->constrained(table: 'hospital_branches');
            $table->foreignId('building_id')->constrained(table: 'hospital_buildings');
            $table->foreignId('room_type_id')->constrained(table: 'room_types');
            $table->string('name');
            $table->string('room_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('details')->nullable();
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
        Schema::dropIfExists('hospital_rooms');
    }
};
