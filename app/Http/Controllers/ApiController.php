<?php

namespace App\Http\Controllers;

use App\Auctions;
use App\CarAds;
use App\AuctionBid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ApiController extends Controller
{
    //
    public function __construct()
    {
        // 
    }

    public function index() {
        return view('index');
    }

    //getAuctions and getAuction for Auction Page in Frontend

    public function getAuctions() {
        $ads = Auctions::all();
        
        if (is_null($ads)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $ads
        ]);
    }

    public function getAuction($id) {
        $ad = Auctions::where('ID', $id)->get();
        $bidInfo = AuctionBid::orderBy('bid_price', 'desc')->get();

        if (is_null($ad && $bidInfo)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ad'=> $ad,
            'bidInfo' => $bidInfo
        ]);
    }

    // Make the API to get all ads for frontend in Frontend

    public function getAds() {
        $ads = CarAds::all();

        if (is_null($ads)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads'=> $ads
        ]);
    }

    public function getAd($id) {
        $ad = CarAds::where('ID', $id)->get();

        if (is_null($ad)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ad'=> $ad
        ]);
    }

    public function filterDate(Request $request) {
        if($request->data === 'Date: newest first') {
            $ads = CarAds::orderBy('SIST_ENDRET', 'desc')->get();
            return response()->json([
                'car_ads'=> $ads,
            ]);
        } elseif ($request->data === 'Date: oldest first') {
            $ads = CarAds::orderBy('SIST_ENDRET', 'asc')->get();
            return response()->json([
                'car_ads'=> $ads,
            ]);
        } 
        // elseif ($request->data === 'Price: lower first') {
        //     $ads = CarAds::orderBy("SALG->BELOP", 'asc')->get();            
        //     return response()->json([
        //         'car_ads'=> $ads,
        //     ]);

        // } elseif ($request->data === 'Price: highest first') {
        //     $ads = CarAds::orderBy("SALG->BELOP", 'desc')->get();            
        //     return response()->json([
        //         'car_ads'=> $ads,
        //     ]);
        // }
    }

    public function filterCar(Request $request) {
        $ads = CarAds::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '123' && $item->VERDI === $request->data) {
                    array_push($array1, $value);
                }
            }
        }

        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads'=> $array1
        ]);
    }

    public function transmissionFilter(Request $request) {
        $ads = CarAds::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '118' && $item->VERDI === $request->data) {
                    array_push($array1, $value);
                }
            }
        }

        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads'=> $array1
        ]);
    }

    public function kilometerFilter(Request $request) {
        $ads = CarAds::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '156') {
                    if($request->data == 1) {
                        if($item->VERDI <= 10000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 2 ) {
                        if($item->VERDI > 10000 && $item->VERDI <= 50000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 3 ) {
                        if($item->VERDI > 50000 && $item->VERDI <= 100000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 4 ) {
                        if($item->VERDI > 100000 && $item->VERDI <= 150000) {
                            array_push($array1, $value);
                        }
                    }  elseif ($request->data == 5 ) {
                        if($item->VERDI > 150000 && $item->VERDI <= 200000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 6 ) {
                        if($item->VERDI > 200000) {
                            array_push($array1, $value);
                        }
                    }
                }
            }
        }
        
        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads'=> $array1
        ]);
    }
    public function yearFilter(Request $request) {
        $ads = CarAds::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '129') {
                    if($request->data == 1) {
                        if($item->VERDI <= 2000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 2 ) {
                        if($item->VERDI > 2000 && $item->VERDI <= 2005) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 3 ) {
                        if($item->VERDI > 2005 && $item->VERDI <= 2010) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 4 ) {
                        if($item->VERDI > 2010 && $item->VERDI <= 2015) {
                            array_push($array1, $value);
                        }
                    }  elseif ($request->data == 5 ) {
                        if($item->VERDI > 2015 && $item->VERDI <= 2020) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 6 ) {
                        if($item->VERDI > 2020) {
                            array_push($array1, $value);
                        }
                    }
                }
            }
        }
        
        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads'=> $array1
        ]);
    }

    public function priceFilter(Request $request) {
        $ads = CarAds::all();
        $array1= array();
        foreach( $ads as $value) {
            $item = json_decode($value->SALG);
            if(!isset($item->BELOP)) {
                continue;
            } else {
                if($item->BELOP > $request->data[0] && $item->BELOP < $request->data[1]) {
                    array_push($array1, $value);
                }
            }
        }

        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads'=> $array1
        ]);
    }


    // Filter function for Auction page
    public function filterAuction(Request $request) {
        if($request->data === 'Date: newest first') {
            $ads = Auctions::orderBy('SIST_ENDRET', 'desc')->get();
            return response()->json([
                'auction_ads'=> $ads,
            ]);
        } elseif ($request->data === 'Date: oldest first') {
            $ads = Auctions::orderBy('SIST_ENDRET', 'asc')->get();
            return response()->json([
                'auction_ads'=> $ads,
            ]);
        } 
    }

    public function auctionFilterCar(Request $request) {
        $ads = Auctions::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '123' && $item->VERDI === $request->data) {
                    array_push($array1, $value);
                }
            }
        }

        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $array1
        ]);
    }

    public function auctionTransmissionFilter(Request $request) {
        $ads = Auctions::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '118' && $item->VERDI === $request->data) {
                    array_push($array1, $value);
                }
            }
        }

        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $array1
        ]);
    }

    public function auctionKilometerFilter(Request $request) {
        $ads = Auctions::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '156') {
                    if($request->data == 1) {
                        if($item->VERDI <= 10000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 2 ) {
                        if($item->VERDI > 10000 && $item->VERDI <= 50000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 3 ) {
                        if($item->VERDI > 50000 && $item->VERDI <= 100000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 4 ) {
                        if($item->VERDI > 100000 && $item->VERDI <= 150000) {
                            array_push($array1, $value);
                        }
                    }  elseif ($request->data == 5 ) {
                        if($item->VERDI > 150000 && $item->VERDI <= 200000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 6 ) {
                        if($item->VERDI > 200000) {
                            array_push($array1, $value);
                        }
                    }
                }
            }
        }
        
        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $array1
        ]);
    }
    public function auctionYearFilter(Request $request) {
        $ads = Auctions::all();
        $array1= array();
        foreach( $ads as $value) {
            $items = json_decode($value->INFO);
            foreach($items as $item) {
                if($item->ID === '129') {
                    if($request->data == 1) {
                        if($item->VERDI <= 2000) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 2 ) {
                        if($item->VERDI > 2000 && $item->VERDI <= 2005) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 3 ) {
                        if($item->VERDI > 2005 && $item->VERDI <= 2010) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 4 ) {
                        if($item->VERDI > 2010 && $item->VERDI <= 2015) {
                            array_push($array1, $value);
                        }
                    }  elseif ($request->data == 5 ) {
                        if($item->VERDI > 2015 && $item->VERDI <= 2020) {
                            array_push($array1, $value);
                        }
                    } elseif ($request->data == 6 ) {
                        if($item->VERDI > 2020) {
                            array_push($array1, $value);
                        }
                    }
                }
            }
        }
        
        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $array1
        ]);
    }

    public function auctionPriceFilter(Request $request) {
        $ads = Auctions::all();
        $array1= array();
        foreach( $ads as $value) {
            $item = json_decode($value->SALG);
            if(!isset($item->BELOP)) {
                continue;
            } else {
                if($item->BELOP > $request->data[0] && $item->BELOP < $request->data[1]) {
                    array_push($array1, $value);
                }
            }
        }

        if (is_null($array1)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $array1
        ]);
    }
}
