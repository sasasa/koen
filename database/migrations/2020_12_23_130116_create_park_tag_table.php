<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParkTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('park_tag', function (Blueprint $table) {
            $table->bigInteger('park_id')->unsigned();
            $table->bigInteger('tag_id')->unsigned();
            $table->primary(['park_id', 'tag_id']);
            $table->timestamps();

            //外部キー制約
            $table->foreign('park_id')
                ->references('id')
                ->on('parks')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('park_tag');
    }
}
