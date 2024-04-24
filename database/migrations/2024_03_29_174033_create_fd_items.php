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
        Schema::create('fd_items', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->string('title');
            $table->string('card_tag')->nullable();
            $table->string('card_info');
            $table->decimal('unit_price', 8, 2); 
            $table->integer('ratings');
            $table->string('summary');
            $table->string('description');
            $table->boolean('isAvailable');
            $table->boolean('status');

            $table->unsignedBigInteger('fd_category_id')->nullable();
            $table->foreign('fd_category_id')->references('id')->on('fd_categories');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fd_items');
    }
};
