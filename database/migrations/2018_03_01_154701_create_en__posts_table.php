<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnPostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create table for storing roles
        Schema::create('en_posts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->string('title');
            $table->text('body');
            $table->string('image')->nullable();
            $table->string('image_title')->nullable();
            $table->string('image_alt')->nullable();
            $table->string('slug')->unique();
            $table->text('meta_description');
            $table->boolean('status')->default(0);
            $table->boolean('featured')->default(0);
            $table->timestamps();
            $table->foreign('author_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('en_posts');
    }
}
