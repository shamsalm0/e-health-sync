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
        Schema::create('discount_service_setups', function (Blueprint $table) {
            $table->id();
            $table->string('service_name');
            $table->foreignId('department_id')->constrained();
            $table->boolean('has_discount')->default(0)->comment('0 - no discount, 1 - has discount');
            $table->boolean('has_commission')->default(0)->comment('0 - no commission, 1 - has commission');
            $table->boolean('is_refundable')->default(0)->comment('0 - no, 1 - yes');
            $table->boolean('in_others')->default(0)->comment('0 - no, 1 - yes');
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
        Schema::dropIfExists('discount_service_setups');
    }
};
