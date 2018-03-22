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
            $table->string('name');
            $table->string('email');
            $table->string('password')->default('test');
            $table->string('firstName')->default('');
            $table->string('surname')->default('');
            $table->integer('status')->default(0);
            $table->integer('is_admin')->default(0);
            $table->integer('money')->default(0);
            $table->text('courses')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
            $table->integer('courses_count')->default(0);
            $table->integer('students')->default(0);
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
