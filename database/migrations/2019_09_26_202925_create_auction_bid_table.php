<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAuctionBidTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('auction_bids', function (Blueprint $table) {
            $table->bigIncrements('id_auction_bid');
            $table->string('name')->nullable();
            $table->bigInteger('mobile_number');
            $table->bigInteger('bid_price');
            $table->string('ID');
            $table->boolean('bid_status');
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
        Schema::dropIfExists('auction_bid');
    }
}
