<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createabouttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('About', function (Blueprint $table) {
            $table->id();
            $table->text('ab_description')->unique()->comment('Mô tả trang giới thiệu');
            $table->text('ab_address')->nullable()->comment('Địa chỉ trang giới thiệu');
            $table->string('ab_email')->nullable()->comment('Email trang giới thiệu');
            $table->string('ab_openH')->nullable()->comment('Thời gian mở cửa');
            $table->string('ab_phone')->nullable()->comment('SDT trang giới thiệu');
            $table->string('ab_map')->nullable()->comment('Bản đồ trang giới thiệu');
            $table->string('ab_img')->nullable()->comment('Ảnh giới thiệu');
            $table->string('ab_img_path')->nullable()->comment('Đường dẫn ảnh giới thiệu');
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
        Schema::dropIfExists('About');
    }
}
