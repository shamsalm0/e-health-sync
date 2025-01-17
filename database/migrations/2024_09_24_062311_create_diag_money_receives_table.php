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
        Schema::create('diag_money_receives', function (Blueprint $table) {
            $table->id();
            $table->boolean('patient_type')->comment('1-indoor,2-prescription,3-out patient')->default(3);
            $table->string('patient_id')->nullable();
            $table->string('patient_name')->nullable();
            $table->foreignId('gender_id')->nullable()->constrained();
            $table->string('dob')->nullable();
            $table->string('mobile')->nullable();
            $table->string('admission_id')->nullable();
            $table->time('reservation_time')->nullable();
            $table->foreignId('reference_id')->nullable()->constrained();
            $table->string('reference_name')->nullable();
            $table->boolean('is_self')->default(0);
            $table->boolean('discount_is_percent')->default(0);
            $table->string('discount_amount')->nullable();
            $table->string('discount_in_bdt')->nullable();
            $table->foreignId('agent_id')->nullable()->constrained();
            $table->string('agent_name')->nullable();
            $table->string('agent_commission_is_percent')->nullable();
            $table->string('agent_commission')->nullable();
            $table->string('agent_commission_in_bdt')->nullable();
            $table->decimal('total_amount', 10, 4)->nullable();
            $table->decimal('net_amount', 10, 4)->nullable();
            $table->decimal('due_amount', 10, 4)->nullable();
            $table->decimal('paid_amount', 10, 4)->nullable();
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
        Schema::dropIfExists('diag_money_receives');
    }
};
