<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Createslidertable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Slider', function (Blueprint $table) {
            $table->id();
            $table->string('sli_name')->unique();
            $table->text('sli_description')->nullable();
            $table->string('sli_button')->unique();
            $table->string('sli_url')->unique();
            $table->string('sli_avatar')->nullable();
            $table->string('sli_avatar_path')->nullable();
            $table->tinyInteger('sort_by')->default(0);
            $table->tinyInteger('sli_status')->default(1);
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
        Schema::dropIfExists('Slider');
    }
}
