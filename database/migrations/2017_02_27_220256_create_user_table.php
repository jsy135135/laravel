<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('user', function(Blueprint $table) {
           $table->increments('id');
           $table->string('username')->unique()->notNull();
           $table->string('password')->notNull();
           $table->rememberToken();# 生成记住登录的字段
           $table->timestamps();# 创建时间、修改时间
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('user');
    }
}
