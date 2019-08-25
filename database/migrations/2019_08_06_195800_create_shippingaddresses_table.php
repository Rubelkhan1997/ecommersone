<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShippingaddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippingaddresses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('country_id')->default(0);
            $table->integer('city_id')->default(0);
            $table->string('zip_code');
            $table->string('phone_number');
            $table->longText('address');
            $table->integer('payment_type');
            $table->integer('payment_status');
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
        Schema::dropIfExists('shippingaddresses');
    }
}
