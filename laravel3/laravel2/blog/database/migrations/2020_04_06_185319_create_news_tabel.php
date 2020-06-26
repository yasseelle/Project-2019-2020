<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTabel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news_tables', function (Blueprint $table) {
            $table->increments('id');
            $table->string('News_title');
            $table->text('News_discription');
            $table->string('News_Category');
            $table->string('News_created_by');
            $table->string('created_by_email');    
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
        Schema::dropIfExists('news_tables');
    }
}
