<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateActionsResponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('actions_responses', function (Blueprint $table) {
            $table->increments('id');

            $table->unsignedInteger('comment_id');
            $table->unsignedInteger('response_id')->nullable();

            $table->integer('action_id');
            $table->text('action_notes')->nullable();

            $table->unsignedInteger('owner_id');
            $table->string('start_date');
            $table->string('end_date');
            
            
            //$table->text('description');
            $table->text('notes')->nullable();
            $table->timestamps();

            $table->foreign('comment_id')->references('id')->on('comments')->onDelete('cascade');
            $table->foreign('response_id')->references('id')->on('responses')->onDelete('cascade');
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
        Schema::dropIfExists('actions_responses');
    }
}
