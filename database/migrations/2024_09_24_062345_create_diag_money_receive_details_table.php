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
        Schema::create('diag_money_receive_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('money_receive_id')->constrained(table: 'diag_money_receives');
            $table->foreignId('test_id')->constrained(table: 'test_names');
            $table->string('test_name')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->foreignId('test_package_id')->nullable()->constrained();
            $table->boolean('is_discount')->default(0);
            $table->decimal('ref_discount', 10, 2)->nullable();
            $table->decimal('total_discount', 10, 2)->nullable();
            $table->integer('qty')->nullable();
            $table->decimal('sub_total', 10, 2)->nullable();
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
        Schema::dropIfExists('diag_money_receive_details');
    }
};
