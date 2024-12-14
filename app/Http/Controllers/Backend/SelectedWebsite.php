<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SelectedWebsite extends Controller
{
    public function storeSelectedWebsite(Request $request)
    {
        $request->validate([
            'website_id' => 'required|integer|exists:websites,id',
        ]);

        session(['selected_website_id' => $request->website_id]);

        return redirect()->back()->with('success', 'Website selected successfully!');
    }
}