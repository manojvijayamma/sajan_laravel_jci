<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contents', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('title')->unique();
            $table->string('parent_id')->nullable();  
            $table->string('image')->nullable();
            $table->string('details')->nullable();                 
            $table->enum('status', ['1', '0'])->default('1');
            $table->string('link_url')->nullable();
            $table->string('section_url')->nullable();
            $table->enum('link_type', ['C', 'S', 'E'])->default('C'); 
            $table->enum('is_widget', ['1', '0'])->default('0');           
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
        Schema::dropIfExists('contents');
    }
}
