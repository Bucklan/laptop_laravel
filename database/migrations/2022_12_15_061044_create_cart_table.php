<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->id();
            // ноутбен юзер байл
            $table->foreignId('user_id')->constrained();
            $table->foreignId('laptop_id')->constrained();
            $table->unsignedtinyInteger('quantity');
            $table->unsignedinteger('ram');
            $table->unsignedinteger('memory');
            $table->string('status')->default('in_cart'); //корзина ишинде бар жогын тек
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cart');
    }
};
