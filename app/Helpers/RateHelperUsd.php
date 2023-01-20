<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\{Cache, Http};

class RateHelperUsd
{
    public static function rate($replace = false, $from, $to = 'IDR')
    {
        try {
            if (!$replace) {
                if (Cache::has('rate_usd')) return;
            }
            $apiURL = 'https://api.exchangerate.host/convert?from=' . $from . '&to=' . $to;
            $response = Http::get($apiURL);
            $response = $response->object();
            $rate = $response->info->rate;

            $now = Carbon::now();
            if (!$replace) {
                Cache::add('rate_usd', $rate, $now->addDay());
            } else {
                if (Cache::has('rate_usd')) {
                    Cache::put('rate_usd', $rate, $now->addDay());
                } else {
                    Cache::add('rate_usd', $rate, $now->addDay());
                }
            }
            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}


