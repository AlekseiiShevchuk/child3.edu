<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1493483027SlidesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('slides')) {
            Schema::create('slides', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('slider_type', ["presentation","test"]);
                $table->string('name');
                $table->string('audio')->nullable();
                $table->text('content');
                $table->integer('lesson_id')->unsigned()->nullable();
                $table->foreign('lesson_id', '33235_5904be128c917')->references('id')->on('lessons')->onDelete('cascade');
                $table->tinyInteger('is_active')->default(0);
                
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
        Schema::dropIfExists('slides');
    }
}
