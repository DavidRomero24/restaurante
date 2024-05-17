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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id')->default();
            $table->unsignedBigInteger('customer_id')->default();
            $table->dateTime('date')->default(now());
            $table->decimal('price',8,2)->default();
            $table -> string ('status') -> nullable();
            $table -> string ('registerby') -> nullable();
            $table->timestamps();
        
            $table->foreign('product_id')
                ->references('id')->on('products');
            $table->foreign('customer_id')
                ->references('id')->on('customers');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
