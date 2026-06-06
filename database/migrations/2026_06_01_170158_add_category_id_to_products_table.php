<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration {
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
       
            $table->unsignedBigInteger('category_id')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn([
                'name',
                'slug',
                'description',
                'price',
                'stock_quantity',
                'image',
                'is_active',
            ]);
        });
    }
};