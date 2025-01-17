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
        Schema::create('diag_report_doctor_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('money_receive_id')->constrained(table: 'diag_money_receives');
            $table->foreignId('report_doctor_id')->constrained(table: 'references');
            $table->decimal('commission', 10, 4)->nullable();

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
        Schema::dropIfExists('diag_report_doctor_commissions');
    }
};
