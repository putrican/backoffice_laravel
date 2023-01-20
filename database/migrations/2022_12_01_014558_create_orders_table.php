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
            $table->string('marketing');
            $table->string('marking');
            $table->string('item');
            $table->string('size');
            $table->integer('qty');
            $table->integer('harga_custom');
            $table->integer('harga_kapal');
            $table->integer('harga_gudang');
            $table->integer('total');
            $table->string('asal');
            $table->string('port');
            $table->integer('total_invoice_rmb');
            $table->string('keterangan');
            $table->string('file');
            $table->string('approve');
            $table->string('no_cont')->nullable();
            $table->string('final')->nullable();
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
