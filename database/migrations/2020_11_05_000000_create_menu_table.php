<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('title')->unique();
            $table->integer('parent_id')->nullable();                            
            $table->enum('status', ['1', '0'])->default('1');
            $table->string('fe_url')->nullable();
            $table->string('admin_url')->nullable();    
            $table->string('icon')->nullable();  
            $table->string('quick_icon')->nullable();    
            $table->integer('priority')->nullable();              
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
        Schema::dropIfExists('menus');
    }
}
