<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Kurs;

class KursController extends Controller
{
    public function exchangeRate($from, $to, $amount)
{
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => 'https://api.exchangerate.host/convert?from=' . $from . '&to=' . $to . '&amount=' . $amount,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => '',
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => 'GET',
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    return json_decode($response, true);
}
}
