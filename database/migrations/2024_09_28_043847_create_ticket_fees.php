<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ticket_fees', function (Blueprint $table) {
            $table->id();
            $table->boolean('type')->default(1)->comment('1 - General Physician, 2 - Emergency, 3 - Registration, 4 - Serial');
            $table->decimal('price', 10, 2)->nullable();
            $table->boolean('status')->default(1)->comment('0 - inactive, 1 - active');

            $table->unsignedBigInteger('created_by')->nullable();
            $table->unsignedBigInteger('updated_by')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrentOnUpdate()->nullable();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ticket_fees');
    }
};
