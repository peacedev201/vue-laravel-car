<?php

namespace App\carAds;

use App\CarAds;
use GuzzleHttp;

class ADS
{
    public function __construct()
    {
        // 
    }

    public function update()
    {
        $client = new GuzzleHttp\Client();
        $res = $client->get('https://billink.no/page2_xml.php?kode=d1adeea9-08a7-4c50-96db-d9379eae8a2a&butikk=iautoas&detaljert=1');
        $response = $res->getBody();
        $xml = new \SimpleXMLElement($response);
        $details = json_encode($xml);
        $value = json_decode($details);
        $result = $value->BODY;
        CarAds::truncate();
        foreach($result->ANNONSE as $item) 
        {
            
            if(!isset($item->BESKRIVELSE)) {
                $item->BESKRIVELSE = "";
            }
            if(!isset($item->FINN_KODE)) {
                $item->FINN_KODE = "";
            }
            if(!isset($item->BILDE)) {
                $item->BILDE = "";
            }
            if(!isset($item->UTSTYR)) {
                $item->UTSTYR = "";
            }
            CarAds::create([
                'ID' => $item->ID,
                'BESKRIVELSE' => $item->BESKRIVELSE,
                'VIS_FASTTEKST' => $item->VIS_FASTTEKST,
                'NR' => $item->NR,
                'TYPE' => $item->TYPE,
                'STATUS' => $item->STATUS,
                'SIST_ENDRET' => $item->SIST_ENDRET,
                'FINN_KODE' => $item->FINN_KODE,
                'KONTAKT' => json_encode($item->KONTAKT),
                'SALG' => json_encode($item->SALG),
                'INFO' => json_encode($item->INFO),
                'BILDE' => json_encode($item->BILDE),
                'UTSTYR' => json_encode($item->UTSTYR)
            ]);
        }
    }
} 