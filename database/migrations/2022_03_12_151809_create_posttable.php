<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePosttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Post', function (Blueprint $table) {
            $table->id();
            $table->string('post_name')->unique();
            $table->unsignedBigInteger('post_cate_id');
            $table->string('post_avatar')->nullable();
            $table->string('post_content')->nullable();
            $table->string('post_description')->nullable();
            $table->tinyInteger('post_status')->default(1);
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
        Schema::dropIfExists('Post');
    }
}
