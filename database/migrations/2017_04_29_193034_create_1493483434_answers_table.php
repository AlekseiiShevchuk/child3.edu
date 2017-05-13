<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1493483434AnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('answers')) {
            Schema::create('answers', function (Blueprint $table) {
                $table->increments('id');
                $table->string('text_answer')->nullable();
                $table->string('image_answer')->nullable();
                $table->tinyInteger('is_correct')->nullable()->default(0);
                $table->integer('slide_id')->unsigned()->nullable();
                $table->foreign('slide_id', '33236_5904bfa93e47f')->references('id')->on('slides')->onDelete('cascade');
                
                $table->timestamps();
                
            });
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('answers');
    }
}
