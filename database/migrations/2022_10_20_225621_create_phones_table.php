<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('phones', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->string("title");
            $table->string("tempUrl");
            $table->float("price");
            $table->string("producedBy");
            $table->integer("prodYear");
            $table->string("color");
            $table->integer("ramSize");
            $table->integer("romSize");
            $table->integer("mainCameraPx");
            $table->integer("frontCameraPx");
            $table->longtext("description")->nullable();  
            $table->string("deliveryMethod")->nullable();
            $table->integer("stockQuantity")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('phones');
    }
};
