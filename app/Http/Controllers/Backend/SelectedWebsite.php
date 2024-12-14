<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectedWebsite extends Controller
{
    public function storeSelectedWebsite($website_id)
    {
        // Store the selected website ID in session
        session(['selectedWebsiteId' => $website_id]);
        return redirect()->back();

    }
}
