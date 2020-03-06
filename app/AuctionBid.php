<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AuctionBid extends Model
{
    //
    protected $fillable = [
        'name', 'mobile_number', 'bid_price', 'ID', 'bid_status'
    ];
}
