<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->string('title');
            $table->string('author');
            $table->string('image');
            $table->text('content');
            $table->string('fotosatu')->nullable();
            $table->string('fotodua')->nullable();
            $table->string('fototiga')->nullable();
            $table->string('fotoempat')->nullable();
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
        Schema::dropIfExists('articles');
    }
}
