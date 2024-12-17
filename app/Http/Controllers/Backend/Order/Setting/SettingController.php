<?php

namespace App\Http\Controllers\Backend\Order\Setting;

use App\Http\Controllers\AdminController;
use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\Order\Setting;
use Illuminate\Support\Facades\Auth;

class SettingController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {

        $website_id = $this->website_active_id;
        $data = Setting::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->select('id', 'title', 'value')->get();

        $details = Setting::where('website_id', $website_id['user_website_active'])->first();

        $website = $this->website;

        return view('Backend.pages.setting.index', compact('data', 'details', 'website'));
    }

    public function fetchData($slug)
    {

        $website_id = $this->website_active_id;
        $details = Setting::where('id', $slug)
            ->first();

        $data = $details->where('user_id', Auth::user()->id)->where('website_id', $website_id['user_website_active'])->select('id', 'title', 'value')->get();

        $website = $this->website;

        return view('Backend.pages.setting.index', compact('data', 'details', 'website'));
    }

    public function postData(Request $request, $slug)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'value' => 'required|string',
        ]);

        Setting::where('id', $slug)->update([
            'user_id' => Auth::user()->id,
            'website_id' => $request->input('website_id'),
            'title' => $request->input('title'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('setting')->with('success', 'Setting updated successfully!');
    }
}
