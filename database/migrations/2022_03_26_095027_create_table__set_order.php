<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableSetOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking', function (Blueprint $table) {
            $table->id();
            $table->string('b_website')->nullable()->comment('Địa chỉ cửa hang đặt');
            $table->dateTime('b_date')->default(now());
            $table->string('b_time');
            $table->string('b_people');
            $table->string('b_name');
            $table->string('b_email');
            $table->string('b_phone');
            $table->string('b_note')->nullable();
            $table->tinyInteger('b_status')->default(1);
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
        Schema::dropIfExists('booking');
    }
}
