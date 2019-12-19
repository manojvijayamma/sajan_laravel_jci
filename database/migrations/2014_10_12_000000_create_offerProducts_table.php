<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOfferProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_products', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('title');
            $table->string('image');
            $table->integer('product_id')->nullable();  
            $table->integer('priority')->nullable();
            $table->integer('offer_price')->nullable();  
            $table->enum('status', ['1', '0'])->default('1');
            $table->enum('show_in_banner', ['1', '0'])->default('0');
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
        Schema::dropIfExists('offer_products');
    }
}
