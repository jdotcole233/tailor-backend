<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    use SoftDeletes;
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customer_jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId("customer_id");
            $table->enum("job_type", ["Shirt", "Suit", "Trousers", "Shorts"]);
            $table->date("start_date");
            $table->date("completion_date");
            $table->integer("quantity");
            $table->decimal("customer_job_price");
            $table->decimal("unit_price");
            $table->enum("payment_status", ['PAID', "UNPAID", "PART PAYMENT"])->default("UNPAID");
            $table->enum("mode_of_payment", []);
            $table->json("extras")->nullable();
            $table->string("currency", 25)->default('GHS');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_jobs');
    }
};
