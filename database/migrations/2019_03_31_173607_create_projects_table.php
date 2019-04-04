<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->bigIncrements('id');
			$table->unsignedBigInteger('category_id');
			$table->foreign('category_id')->references('id')->on('categories');
			$table->string('name')->unique();
			$table->text('description');
			$table->text('features');
			$table->text('url');
			$table->string('thumbnail');
			$table->string('image');
			$table->tinyInteger('flag');
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
        Schema::dropIfExists('projects');
    }
}
