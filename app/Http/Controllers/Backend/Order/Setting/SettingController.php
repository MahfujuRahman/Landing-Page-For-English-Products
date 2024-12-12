<?php

namespace App\Http\Controllers\Backend\Order\Setting;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Models\Order\Setting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class SettingController extends Controller
{
    public function index()
    {
        $data = Setting::select('id','title','value')->get();
        $details = Setting::first();

        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();


        return view('Backend.pages.setting.index', compact('data','details', 'website'));
    }

    // public function create()
    // {
    //     return view('Backend.pages.setting.create');
    // }

    // public function store(Request $request)
    // {
    //     $data = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'value' => 'required|numeric|min:0',
    //     ]);

    //     Setting::create([
    //         'title' => $data['title'],
    //         'value' => $data['value'],
    //     ]);

    //     return redirect()->route('setting.index')->with('success', 'Setting added successfully!');
    // }

    // public function edit($id)
    // {
    //     $setting = Setting::findOrFail($id);
    //     return view('Backend.pages.setting.edit', compact('setting'));
    // }

    // public function update(Request $request, $id)
    // {
    //     $setting = Setting::findOrFail($id);

    //     $data = $request->validate([
    //         'title' => 'required|string|max:255',
    //         'value' => 'required|numeric|min:0',
    //     ]);

    //     $setting->update([
    //         'title' => $data['title'],
    //         'value' => $data['value'],
    //     ]);

    //     return redirect()->route('setting.index')->with('success', 'Setting updated successfully!');
    // }

    // public function destroy($id)
    // {
    //     $setting = Setting::findOrFail($id);
    //     $setting->delete();

    //     return redirect()->route('setting.index')->with('success', 'Setting deleted successfully!');
    // }

    public function fetchData($slug)
    {
        $details = Setting::where('id', $slug)->first();
        $data = Setting::select('id','title','value')->get();

        $authUser = auth()->user()->id;
        $website = Website::where('user_id', $authUser)->get();

        return view('Backend.pages.setting.index', compact('data','details', 'website'));
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
            'website_id' => $request->input('website_id') ,
            'title' => $request->input('title'),
            'value' => $request->input('value'),
        ]);

        return redirect()->route('setting')->with('success', 'Setting updated successfully!');
    }
}
