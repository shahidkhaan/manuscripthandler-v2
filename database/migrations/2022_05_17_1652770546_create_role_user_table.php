<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {

            $table->id();

            $table->unsignedBigInteger('role_id')->unsigned();
            $table->string('user_type')->comment('Admin, User');

          //  $table->foreign('role_id')->references('id')->on('roles')->onDelete->onupdate('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('role_user');
    }
}
