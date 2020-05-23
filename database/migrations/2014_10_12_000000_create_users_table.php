<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable()->comment('Имя');
            $table->string('surname')->nullable()->comment('Фамилиля');
            $table->string('patronymic')->nullable()->comment('Отчество');
            $table->json('contacts')->nullable()->comment('Контакты пользователя');
            $table->string('avatar')->nullable()->comment('Аватар');
            $table->string('email')->unique()->comment('Почта');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username')->unique()->nullable()->default(null);
            $table->string('api_token')->unique()->nullable()->default(null);
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
