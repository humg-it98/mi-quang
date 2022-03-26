<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createproducttable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Product', function (Blueprint $table) {
            $table->id();
            $table->string('pro_name')->unique();
            $table->text('pro_slug')->nullable();
            $table->unsignedBigInteger('pro_category_id');
            $table->unsignedBigInteger('pro_user_id')->default(0);
            $table->integer('pro_price')->default(0)->comment('giá gốc');
            $table->integer('pro_sale')->default(0)->comment('giá giảm giá');
            $table->text('pro_content')->nullable();
            $table->mediumText('pro_description')->nullable();
            $table->string('pro_avatar')->nullable();
            $table->tinyInteger('pro_active')->default(1);
            $table->integer('pro_pay')->default(0)->comment('số lượt mua');
            $table->integer('pro_number')->default(0)->comment('tổng số lượng');
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
        Schema::dropIfExists('Product');
    }
}
