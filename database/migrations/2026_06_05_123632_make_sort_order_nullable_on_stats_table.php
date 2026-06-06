<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->integer('sort_order')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('stats', function (Blueprint $table) {
            $table->integer('sort_order')->nullable(false)->change();
        });
    }
};