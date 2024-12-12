<?php

namespace App\Http\Controllers\Backend\Website;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SalesController extends Controller
{
    public function index()
    {
        $last7Days = DB::table('order_visitors')
            ->selectRaw('DATE(date) as day, COUNT(*) as visitors, SUM(buy) as buys')
            ->groupByRaw('DATE(date)')
            ->orderByRaw('DATE(date) DESC')
            ->limit(7)
            ->get();

        $mostVisitedRegion = DB::table('order_visitors')
            ->select('region', DB::raw('COUNT(*) as count'))
            ->groupBy('region')
            ->orderByDesc('count')
            ->first();

        $mostVisitedCity = DB::table('order_visitors')
            ->select('city', DB::raw('COUNT(*) as count'))
            ->groupBy('city')
            ->orderByDesc('count')
            ->first();

        $topUrls = DB::table('order_visitors')
            ->select('url', DB::raw('COUNT(*) as count'))
            ->groupBy('url')
            ->orderByDesc('count')
            ->limit(5)
            ->get();

        $mostVisitedDate = DB::table('order_visitors')
            ->selectRaw('DATE(date) as day, COUNT(*) as visitors')
            ->groupByRaw('DATE(date)')
            ->orderByDesc('visitors')
            ->first();

        return response()->json([
            'unique_visitors' => DB::table('order_visitors')->distinct('ip')->count('ip'),
            'total_sales' => DB::table('order_visitors')->where('buy', '>', 0)->count(),
            'repetitive_visitors' => DB::table('order_visitors')
                ->select('ip')
                ->groupBy('ip')
                ->havingRaw('COUNT(ip) > 1')
                ->count(),
            'most_visited_region' => ($mostVisitedRegion->region ?? 'dhaka') . ' - ' . ($mostVisitedRegion->count ?? 0),
            'most_visited_city' => ($mostVisitedCity->city ?? 'dhaka') . ' - ' . ($mostVisitedCity->count ?? 0),
            'last_7_days' => $last7Days,
            'visitor_buy_ratio' => DB::table('order_visitors')->count() > 0
                ? round(DB::table('order_visitors')->where('buy', '>', 0)->count() / DB::table('order_visitors')->count(), 2)
                : 0,
            'top_visited_urls' => $topUrls,
            'most_visited_date' => [
                'day' => $mostVisitedDate->day ?? null,
                'visitors' => $mostVisitedDate->visitors ?? 0,
            ],
        ]);
    }
}
