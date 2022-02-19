<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id();
            $table->string('title')->index();
            $table->text('description');
            $table->text('img');
            $table->enum('status',['DRAFT', 'ACTIVE', 'BLOCKED'])->default('DRAFT');
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('source_id');
            $table->timestamps();

            $table->foreign('author_id')->references('id')->on('authors');
            $table->foreign('source_id')->references('id')->on('news_sources');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
