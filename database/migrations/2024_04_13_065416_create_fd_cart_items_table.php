<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * This is cart items. pivot was used to connect fd_items
     */
    public function up(): void
    {
        Schema::create('fd_cart_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();

            $table->integer('quantity');          

            $table->unsignedBigInteger('fd_cart_id')->nullable();
            $table->foreign('fd_cart_id')->references('id')->on('fd_carts');

            $table->unsignedBigInteger('fd_item_id')->nullable();
            $table->foreign('fd_item_id')->references('id')->on('fd_items');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fd_cart_items');
    }
};
