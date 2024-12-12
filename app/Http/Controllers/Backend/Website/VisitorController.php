<?php

namespace App\Http\Controllers\Backend\Website;

use Exception;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class VisitorController extends Controller
{
    public function index()
    {
        $clientIP = request()->ip();
        $lat = request()->lat;
        $lon = request()->lon;

        try {
            if (!$lat || !$lon) throw new Exception("lat lon missing", 500);

            $response = file_get_contents("https://api.opencagedata.com/geocode/v1/json?q=$lat%2C+$lon&pretty=1&no_annotations=1&key=200328b26fae49028bb62c851a78526a");
            $parse_data = json_decode($response, true);

            $result = $parse_data['results'][0]['components'];
            $city = $result['city'] ?? null;
            $region = $result['state_district'] ?? null;
            $country = $result['country'] ?? null;
            $location = $result['suburb'] ?? null;
            $org = $result['municipality'] ?? null;
            $postal = $result['postcode'] ?? null;
            $timezone = ($result['continent'] ?? 'Asia') . '/' . 'Dhaka';
        } catch (\Throwable $th) {

            $response = file_get_contents('https://ipinfo.io/json');
            $parse_data = json_decode($response, true);

            $city = $parse_data['city'];
            $region = $parse_data['region'];
            $country = $parse_data['country'];
            $location = $parse_data['loc'];
            $org = $parse_data['org'];
            $postal = $parse_data['postal'];
            $timezone = $parse_data['timezone'];
        }

        $ip = $clientIP;
        $url = request()->headers->get('referer');

        $check = DB::table('order_visitors')->where('ip', $ip)
            ->whereDate('date', Carbon::now()->toDateString())
            ->where('url', $url)
            ->orderBy('id', 'DESC')->first();

        $data = [
            'ip' => $ip,
            'lat' => $lat,
            'lon' => $lon,
            'url' => $url,
            'city' => $city,
            'region' => $region,
            'country' => $country,
            'ip_location' => $location,
            'org' => $org,
            'postal' => $postal,
            'timezone' => $timezone,
        ];

        if (!$check) {
            DB::table('order_visitors')->insert($data);
        } else {
            $data['count'] = $check->count + 1;
            DB::table('order_visitors')
                ->where('ip', $ip)
                ->whereDate('date', Carbon::now()->toDateString())
                ->update($data);
        }

        return $data;
    }
}
