<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSnippetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('snippets', function (Blueprint $table) {
            $table->increments('id');
            $table->longText('snippetdetails');
            $table->longText('snippetags');
            $table->longText('snippetfile');
            $table->longText('user_name');
            $table->longText('user_slug');
            $table->enum('file_type', ['video', 'image']);
            $table->string('snippet_type')->nullable();
            $table->integer('likes')->default(0);
            $table->longText('file_extension');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
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
        Schema::dropIfExists('snippets');
    }
}
