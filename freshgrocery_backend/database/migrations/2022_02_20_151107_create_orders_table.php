<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->integer('user_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email');
            $table->string('contact_no');
            $table->string('payment_id')->nullable();
            $table->string('payment_mode');
            $table->string('tracking_no');
            $table->bigInteger('destination_id')->unsigned();
            $table->tinyInteger('status')->default('0');
            $table->text('remark')->nullable();  
            $table->timestamps();
            $table->foreign('destination_id')->references('id')->on('delivery_destinations')->onDelete('cascade');
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
