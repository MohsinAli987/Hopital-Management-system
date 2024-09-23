<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactionns', function (Blueprint $table) {
            $table->id();
            $table->string('cust_name');
            $table->string('cust_email');
            $table->bigInteger('card_number')->nullable(false);
            $table->integer('card_cvc')->nullable(false);
            $table->string('card_exp_month')->nullable(false);
            $table->string('card_exp_year')->nullable(false);
            $table->string('item_name');
            $table->string('item_number');
            $table->float('item_price');
            $table->string('item_price_currency');
            $table->string('paid_amount');
            $table->string('paid_amount_currency');
            $table->string('txn_id');
            $table->string('payment_status');
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
        Schema::dropIfExists('transactionns');
    }
}
