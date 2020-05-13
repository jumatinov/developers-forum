<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnswerLikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('answer_likes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('Пользователь');
            $table->unsignedInteger('answer_id')->comment('Ответ');
            $table->string('type')->default('like')->nullable(false)->comment('Тип лайка');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('answer_id')->references('id')->on('answers')->onDelete('CASCADE');
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
        Schema::dropIfExists('answer_likes');
    }
}
