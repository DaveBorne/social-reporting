<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('project_id');
            $table->unsignedInteger('owner_id');
            $table->unsignedInteger('platform_id');
            $table->string('title');
            $table->string('url');
            $table->string('start_date');
            $table->string('end_date');
            
            
            //$table->text('description');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('project_id')->references('id')->on('projects');
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('comments');
    }
}
