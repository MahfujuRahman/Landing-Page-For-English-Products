<?php

namespace App\Http\Controllers\Backend\Website;

use App\Models\Website;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class WebsiteController extends Controller
{
    public function index()
    {
        $data = Website::orderBy('id')->get();
        return view('Backend.pages.website.index', compact('data'));
    }

    public function create()
    {
        return view('Backend.pages.website.create');
    }

    public function store(Request $request)
    {

        $data = $request->validate([
            'site_name' => 'required|string|max:200',
            'site_url' => 'required|string|max:100',
            'domain_name' => 'required|string|max:100',
            'status' => 'required|in:active,inactive,deleted',
        ]);

        $data = Website::create([
            'user_id' => Auth::user()->id,
            'site_name' => $data['site_name'],
            'site_url' => $data['site_url'],
            'domain_name' => $data['domain_name'],
            'status' => $data['status'],
        ]);

        if(request()->is_default == 1){
            Website::where('is_default', 1)->update(["is_default" => 0]);
            $data->update([
                "is_default" => 1,
            ]);
        }

        return redirect()->route('website.index')->with('success', 'Website Created successfully!');
    }

    public function edit($id)
    {
        $data = Website::findOrFail($id);
        return view('Backend.pages.website.edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $website = Website::findOrFail($id);

        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_url' => 'required|string|max:100',
            'status' => 'required|in:active,inactive,deleted',
        ]);

        $website->update([
            'user_id' => Auth::user()->id,
            'site_name' => $data['site_name'],
            'site_url' => $data['site_url'],
            'domain_name' => $request['domain_name'],
            'status' => $data['status'],
        ]);

        if(request()->is_default == 1){
            Website::where('is_default', 1)->update(["is_default" => 0]);
            $website->update([
                "is_default" => 1,
            ]);
        }

        return redirect()->route('website.index')->with('success', 'Website Updated successfully!');
    }

    public function destroy($id)
    {
        $website = Website::findOrFail($id);
        $website->delete();

        return redirect()->route('website.index')->with('success', 'Website deleted successfully!');
    }
}