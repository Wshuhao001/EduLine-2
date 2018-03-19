<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('description');
            $table->text('short_description');
            $table->string('image')->nullable();
            $table->integer('category_id');
            $table->integer('user_id');
            $table->text('bought')->nullable();
            $table->integer('students')->default(0);
            $table->text('structure')->nullable();
            $table->string('demo')->nullable();
            $table->text('skills')->nullable();
            $table->text('requirements')->nullable();
            $table->integer('status')->default(0);
            $table->integer('price')->default(0);
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
        Schema::dropIfExists('courses');
    }
}
