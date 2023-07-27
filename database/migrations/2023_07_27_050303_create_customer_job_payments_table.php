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
        Schema::create('customer_job_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_job_id');
            $table->decimal('amount_paid', 5, 2);
            $table->enum('mode_of_payment', ['CASH', 'MOBILE MONEY', 'CHEQUE', 'BANK TRANSFER'])->default("CASH");
            $table->date('payment_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_job_payments');
    }
};
