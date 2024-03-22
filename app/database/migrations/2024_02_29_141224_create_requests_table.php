<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Requests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('comment');
            $table->string('tel')->nullable();
            $table->string('e-mail');
            $table->date('deadline')->nullable();
            $table->string('status')->nullable();
            $table->integer('user_id');
            $table->integer('service_id');
            $table->integer('del_flg');
            $table->integer('transaction');
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
        Schema::dropIfExists('Requests');
    }
}
