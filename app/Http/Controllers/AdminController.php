<?php

namespace App\Http\Controllers;

use App\AdminUser;
use App\CarAds;
use App\Auctions;
use App\User;
use App\AuctionBid;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
// use SimpleXMLElement;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        //        
    }
    public function index()
    {
        //
        // $client = new GuzzleHttp\Client();
        // $res = $client->get('https://billink.no/page2_xml.php?kode=d1adeea9-08a7-4c50-96db-d9379eae8a2a&butikk=iautoas&detaljert=1');
        // $response = $res->getBody();
        // $xml=simplexml_load_string($response);
        // foreach($xml->children() as $child)
        // {
        //     print_r($child);
        // }
        // exit;
        return view('admin');
    }

    public function login(Request $request)
    {
        $admin_user = AdminUser::all();
        if ($request->name === $admin_user[0]->name && Hash::check($request->password, $admin_user[0]->password)) {
            return response()->json([
                'name' => 'Administrator',
                'status' => 'success'
            ]);
        } else {
            return response()->json([
                'error' => 'These credentials do not match our records.'
            ]);
        }
    }

    // Displaying the all ads for Auction (except sold) on Amdin panel

    public function getAuction()
    {
        $ads = CarAds::all();

        if (is_null($ads)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'car_ads' => $ads
        ]);
    }

    // Create the auctions and save it to the database

    public function auctionCreate(Request $request)
    {
        foreach ($request->body as $item) {
            if(Auctions::where('ID', '=', $item['ID'])->exists()) {
                continue;
            } else {
                Auctions::create([
                    'ID' => $item['ID'],
                    'BESKRIVELSE' => $item['BESKRIVELSE'],
                    'VIS_FASTTEKST' => $item['VIS_FASTTEKST'],
                    'NR' => $item['NR'],
                    'TYPE' => $item['TYPE'],
                    'STATUS' => $item['STATUS'],
                    'SIST_ENDRET' => $item['SIST_ENDRET'],
                    'FINN_KODE' => $item['FINN_KODE'],
                    'KONTAKT' => json_encode($item['KONTAKT']),
                    'SALG' => json_encode($item['SALG']),
                    'INFO' => json_encode($item['INFO']),
                    'BILDE' => json_encode($item['BILDE']),
                    'UTSTYR' => json_encode($item['UTSTYR']),
                    'timer' => json_encode($item['timer'])
                ]);
            }
        }

        $ads = Auctions::all();
        
        if (is_null($ads)) {
            return $this->sendError('Not found.');
        }


        return response()->json([
            'auction_ads'=> $ads,
            'status' => 'success'
        ]);
    }

    public function auctionRemove(Request $request) {
        foreach ($request->body as $item) {
            Auctions::where('ID', $item['ID'])->delete();
        }

        $ads = Auctions::all();
        
        if (is_null($ads)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'auction_ads'=> $ads,
            'status' => 'success'
        ]);
    }

    public function getCustomers() {
        $users = User::all();
        if (is_null($users)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'customers' => $users
        ]);
    }

    public function getBids() {
        $bidInfo = AuctionBid::all();
        if (is_null($bidInfo)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'bidInfo' => $bidInfo
        ]);
    }

    public function putBids(Request $request) {
        $bid = AuctionBid::create([
            'name' => $request->body['name'],
            'mobile_number' => $request->body['mobile_number'],
            'bid_price' => $request->body['price'],
            'ID' => $request->body['ID'],
            'bid_status' => $request->body['bid_status']
        ]);

        $bidInfo = AuctionBid::orderBy('bid_price', 'desc')->get();

        if (is_null($bid)) {
            return $this->sendError('Not found.');
        }

        return response()->json([
            'success' => $bidInfo
        ]);
    }

}
