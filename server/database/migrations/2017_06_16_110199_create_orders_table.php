<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('currency_id');
            $table->float('amount_usd', 8, 2)->default(0);
            $table->float('amount_purchased', 8, 2)->default(0);
            $table->float('exchange_rate', 8, 2)->default(0);
            $table->float('percentage_surchage', 8, 2)->default(0);
            $table->float('amount_surcharge', 8, 2)->default(0);
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
        Schema::dropIfExists('orders');
    }
}
