<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\WebsiteActive;
use App\Http\Controllers\Controller;
use App\Models\Website;
use Illuminate\Support\Facades\Auth;

class SelectedWebsite extends Controller
{
    public function storeSelectedWebsite(Request $request)
    {
        $data = $request->validate([
            'website_id' => 'required|exists:websites,id',
        ]);

        $user = Auth::user()->id;
        $website = WebsiteActive::where('user_id', $user)->first();

        if ($website) {
            $website->update([
                'user_website_active' => $data['website_id'],
            ]);
        } else {
            WebsiteActive::create([
                'user_id' => $user,
                'user_website_active' => $data['website_id'],
            ]);
        }

        return redirect()->back()->with('success', 'Active website updated successfully!');
    }
}
