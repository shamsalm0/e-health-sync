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
        Schema::create('report_doctor_commissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('report_doctor_id')->constrained(table: 'references');
            $table->foreignId('service_id')->constrained(table: 'discount_service_setups');
            $table->foreignId('test_name_id')->constrained(table: 'test_names');
            $table->boolean('commission_on')->default(1)->comment('1 - single item, 2 - all items');
            $table->boolean('commission_type')->default(1)->comment('1 - percentage, 2 - amount');
            $table->decimal('commission', 10, 2)->nullable();
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
        Schema::dropIfExists('report_doctor_commissions');
    }
};
