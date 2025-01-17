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
        Schema::create('diag_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('money_receive_id')->constrained(table: 'diag_money_receives');
            $table->decimal('amount', 10, 4)->nullable();
            $table->boolean('type')->default(1)->comment('1 - pay, 2 - due, 3 - refund');
            $table->foreignId('counter_id')->nullable()->constrained(table: 'hospital_counters');

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
        Schema::dropIfExists('diag_transactions');
    }
};
