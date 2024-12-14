<?php

namespace App\Http\Controllers\Backend;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RelatedDataController extends Controller
{
    public function getWebsiteData($website_id)
    {
        // Log::info("Fetching data for website ID: " . $website_id); // Log the website_id
        return 'Hello World';

        $website = Website::find($website_id);

        if ($website) {
            // Return the website-related data in JSON format
            return response()->json([
                'status' => 'success',
                'website' => $website,
                'related_data' => $website->relatedData, // Example: Update this with relevant data
            ]);
        } else {
            return response()->json(['status' => 'error', 'message' => 'Website not found']);
        }
    }
}