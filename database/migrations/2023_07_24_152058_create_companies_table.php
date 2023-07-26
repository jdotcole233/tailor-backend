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
        Schema::create('companies', function (Blueprint $table) {
            $table->id('id');
            $table->string('company_name', 100);
            $table->string('address_street', 100)->nullable();
            $table->string('suburb', 50);
            $table->string('region', 50);
            $table->string('country', 50);
            $table->string('company_logo', 200)->nullable();
            $table->json("social_media_handles")->nullable();
            $table->string("primary_phone_number", 24);
            $table->string("secondary_phone_number", 24)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
