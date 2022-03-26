<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createcategoriestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Categories', function (Blueprint $table) {
            $table->id();
            $table->string('c_name')->unique()->comment('Tên danh mục');
            $table->string('c_link')->nullable()->comment('Đường dẫn');
            $table->text('c_description')->nullable()->comment('Mô tả');
            $table->string('c_avatar')->nullable()->comment('avatar danh mục');
            $table->string('c_avatar_path')->nullable()->comment('đường dẫn avatar danh mục');
            $table->tinyInteger('c_status')->default(1)->comment('trạng thái hiển thị');
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
        Schema::dropIfExists('Categories');
    }
}
