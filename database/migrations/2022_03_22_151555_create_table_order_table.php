<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Order', function (Blueprint $table) {
            $table->id();
            $table->integer('od_code')->comment('Ma don hang de tra cuu');
            $table->unsignedBigInteger('od_customer_id')->default(0)->index();
            $table->string('od_cus_name');
            $table->string('od_cus_phone');
            $table->string('od_cus_email');
            $table->string('od_cus_address');
            $table->string('od_note')->nullable();
            $table->tinyInteger('od_status')->default(1);
            $table->tinyInteger('od_type')->default(1)->comment('1 thanh toan thuong, 2 la online');
            $table->unsignedBigInteger('od_total_moneys')->default(0);
            $table->integer('od_total_products')->default(0);
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
        Schema::dropIfExists('Order');
    }
}
