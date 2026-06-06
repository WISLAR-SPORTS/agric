<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farmers', function (Blueprint $table) {
            $table->id();

            $table->string('farmer_number')->unique();
            $table->string('first_name');
            $table->string('last_name');

            $table->string('gender')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('phone')->nullable();
            $table->string('email')->nullable();

            $table->string('national_id')->nullable();

            $table->string('district')->nullable();
            $table->string('sub_county')->nullable();
            $table->string('village')->nullable();

            $table->decimal('farm_size', 10, 2)->nullable();
            $table->string('farm_size_unit')->default('Acres');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farmers');
    }
};