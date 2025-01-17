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
        Schema::create('emp_families', function (Blueprint $table) {
            $table->id();
            $table->foreignId('emp_id')->constrained(table: 'emp_infos');
            $table->string('name')->nullable();
            $table->foreignId('occupation_id')->constrained();
            $table->boolean('relation')->comment('0 - father, 1 - mother, 2 - brother, 3 - sister, 4 - husband, 5 - wife, 6 - son, 7 - daughter, 8 - other')->nullable();
            $table->string('nid')->nullable();
            $table->string('birth_certificate')->nullable();
            $table->string('mobile')->nullable();
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
        Schema::dropIfExists('emp_families');
    }
};
