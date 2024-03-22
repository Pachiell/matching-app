<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Bookmarks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('service_id');
            $table->string('title');
            $table->integer('amount');
            $table->string('comment');
            $table->string('image')->nullable();
            $table->tinyInteger('del_flg');
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
        Schema::dropIfExists('Bookmarks');
    }
}
