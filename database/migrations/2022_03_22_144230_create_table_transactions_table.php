<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tst_order_id');
            $table->unsignedBigInteger('od_product_id');
            $table->integer('od_sale')->default(0);
            $table->integer('od_qty')->default(0);
            $table->integer('od_price')->default(0);
            $table->text('od_note')->nullable();
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
        Schema::dropIfExists('Transactions');
    }
}
