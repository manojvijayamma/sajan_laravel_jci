<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('order_no');
            $table->dateTime('order_date');
            $table->integer('user_id');            
            $table->integer('grant_total');
            $table->text('firstname');           
            $table->string('lastname');
            $table->string('phone');
            $table->string('email');           
            $table->enum('status',['pending','delivered','cancelled'])->default('pending');
            $table->string('address');  
            $table->string('country');   
            $table->string('town');  
            $table->string('state'); 
            $table->string('postalcode');              

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
        Schema::dropIfExists('orders');
    }
}
