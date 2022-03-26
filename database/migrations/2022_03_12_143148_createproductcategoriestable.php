<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createproductcategoriestable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Productcategories', function (Blueprint $table) {
            $table->id();
            $table->string('p_c_name')->unique()->comment('Danh mục đồ ăn');
            $table->string('p_c_slug')->comment('Slug tên danh mục đồ ăn');
            $table->tinyInteger('p_c_active')->default(1)->comment('Trạng thái hiển thị');
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
        Schema::dropIfExists('Productcategories');
    }
}
