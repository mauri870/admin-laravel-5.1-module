<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOffersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name',255);
            $table->text('body');
            $table->string('base_value',10)->nullable();
            $table->string('promo_value',10)->nullable();
            $table->string('link_offer',255)->nullable();
            $table->string('img_ext',255);

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
        Schema::drop('offers');
    }

}
