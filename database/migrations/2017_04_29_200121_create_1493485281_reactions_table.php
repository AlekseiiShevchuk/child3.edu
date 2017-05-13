<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Create1493485281ReactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(! Schema::hasTable('reactions')) {
            Schema::create('reactions', function (Blueprint $table) {
                $table->increments('id');
                $table->enum('type', ["correct","incorrect"]);
                $table->string('title');
                $table->string('audio')->nullable();
                $table->text('content')->nullable();
                
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
        Schema::dropIfExists('reactions');
    }
}
