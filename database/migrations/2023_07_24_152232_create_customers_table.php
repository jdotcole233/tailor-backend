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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId("company_id");
            $table->string("customer_first_name", 100);
            $table->string("customer_last_name", 100);
            $table->string("customer_primary_phone_number", 24);
            $table->string("customer_secondary_phone_number", 24)->nullable();
            $table->date("dob")->nullable();
            $table->enum("gender", ["MALE", "FEMALE"])->default("MALE");
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
