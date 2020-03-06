<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Auctions extends Model
{
    //
    protected $fillable = [
        'ID', 'NR', 'TYPE', 'STATUS', 'SIST_ENDRET', 'FINN_KODE', 'KONTAKT', 'SALG', 'INFO', 'BILDE', 'UTSTYR', 'BESKRIVELSE', 'VIS_FASTTEKST', 'timer'
    ];
}
