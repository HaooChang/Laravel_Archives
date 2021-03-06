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
            $table->string('name')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('avatar');                                 //頭像
            $table->string('confirmation_token');                     //驗證Email Token
            $table->boolean('is_active')->default(false);             //驗證用戶Email是否認證
            $table->unsignedInteger('archives_count')->default(0);    //文章數
            $table->unsignedInteger('answers_count')->default(0);     //回覆數
            $table->unsignedInteger('comments_count')->default(0);    //評論數
            $table->unsignedInteger('favorites_count')->default(0);   //收藏數
            $table->unsignedInteger('likes')->default(0);             //點讚數
            $table->unsignedInteger('followers_count')->default(0);   //被關注數
            $table->unsignedInteger('followings_count')->default(0);  //關注數
            $table->json('settings')->nullable();
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
