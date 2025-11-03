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

            // Link to the user who placed the order (the buyer)
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Link to the product that was purchased
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade');

            // The final price paid for the product
            $table->decimal('total_paid', 10, 2);

            // Order status: 'pending', 'paid', 'shipped', 'completed', 'cancelled'
            $table->string('status')->default('paid');

            $table->timestamps();
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
