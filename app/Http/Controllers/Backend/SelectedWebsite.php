<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Models\UserWebsiteActive;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SelectedWebsite extends Controller
{
    public function storeSelectedWebsite(Request $request)
    {
        $data = $request->validate([
            'website_id' => 'required|exists:websites,id',
        ]);

        $user = Auth::user()->id;
        $website = UserWebsiteActive::where('user_id', $user)->first();

        if ($website) {
            $website->update([
                'user_website_active' => $data['website_id'],
            ]);
        } else {
            UserWebsiteActive::create([
                'user_id' => $user,
                'user_website_active' => $data['website_id'],
            ]);
        }
        $previousUrl = url()->previous();
        // dd($previousUrl);
        return redirect($previousUrl)->with('success', 'Active website updated successfully!');
    }
}
