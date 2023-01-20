<?php

namespace App\Helpers;

use Carbon\Carbon;
use Illuminate\Support\Facades\{Cache, Http};

class RateHelperYuan
{
    public static function rate($replace = false, $from, $to = 'IDR')
    {
        try {
            if (!$replace) {
                if (Cache::has('rate_yuan')) return;
            }
            $apiURL = 'https://api.exchangerate.host/convert?from=' . $from . '&to=' . $to;
            $response = Http::get($apiURL);
            $response = $response->object();
            $rate = $response->info->rate;

            $now = Carbon::now();
            if (!$replace) {
                Cache::add('rate_yuan', $rate, $now->addDay());
            } else {
                if (Cache::has('rate_yuan')) {
                    Cache::put('rate_yuan', $rate, $now->addDay());
                } else {
                    Cache::add('rate_yuan', $rate, $now->addDay());
                }
            }

            return true;
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}
