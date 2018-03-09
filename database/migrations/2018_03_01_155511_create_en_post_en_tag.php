<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnPostEnTag extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('en_post_en_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('en_post_id')->unsigned();
            $table->foreign('en_post_id')->references('id')->on('en_posts')->onDelete('cascade');
            $table->integer('en_tag_id')->unsigned();
            $table->foreign('en_tag_id')->references('id')->on('en_tags')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('en_post_en_tag');
    }
}
