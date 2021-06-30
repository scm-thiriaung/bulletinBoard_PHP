<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->unique();
            $table->string('description');
            $table->integer('status')->default(1);

            /** Added By Foreign Keys */
            $table->unsignedInteger('created_user_id');
            $table->foreign('created_user_id')->references('id')->on('users');

            /** Update By Foreign Keys */
            $table->unsignedInteger('updaed_user_id');
            $table->foreign('updaed_user_id')->references('id')->on('users');

            $table->dateTime('created_at');
            $table->dateTime('updated_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
