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
        Schema::create('broker_numbers', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('broker_id');
            $table->unsignedInteger('company_id');
            $table->string('number');
            $table->timestamps();

            $table->foreign('broker_id')->references('id')->on('broker');
            $table->foreign('company_id')->references('id')->on('company');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('broker_numbers');
    }
};
