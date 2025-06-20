<?php

namespace App\Http\Controllers\Backend\About;

use App\Models\Website;
use App\Models\Home\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminController;

class AboutController extends AdminController
{
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        $website_active_id = $this->website_active_id;

        $data = About::where('website_id', $website_active_id['user_website_active'])
            ->orderBy('id')->get();

        return view('Backend.pages.about.index', compact('data'));
    }

    public function create()
    {
        $authUser = Auth::user()->id;
        $website = Website::where('user_id', $authUser)->get();

        return view('Backend.pages.about.create', compact('website'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'button_title' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'description_first' => 'nullable|string',
            'description_second' => 'nullable|string',
        ]);

        $about = About::where('user_id', Auth::user()->id)
            ->where('website_id', $data['website_id'])
            ->first();

        if ($about) {
            $this->update($about->id);
        }

        About::create([
            'user_id' => Auth::user()->id,
            'website_id' => $data['website_id'],
            'title' => $data['title'],
            'button_title' => $data['button_title'],
            'button_url' => $data['button_url'],
            'description_first' => $data['description_first'],
            'description_second' => $data['description_second'],
        ]);

        return redirect()->route('about.index')->with('success', 'About created successfully.');
    }

    public function edit(Request $request, $id)
    {

        $website = $this->website;
        $website_id = $this->website_active_id;

        $data = About::where('user_id', Auth::user()->id)
            ->where('website_id', $website_id['user_website_active'])
            ->orderBy('id')->first();

        return view('Backend.pages.about.edit', compact('data', 'website'));
    }

    public function update($id)
    {
        $about = About::findOrFail($id);

        $data = request()->validate([
            'user_id' => 'required|integer|exists:users,id',
            'website_id' => 'required|integer|exists:websites,id',
            'title' => 'required|string|max:255',
            'button_title' => 'required|string|max:255',
            'button_url' => 'required|string|max:255',
            'description_first' => 'nullable|string',
            'description_second' => 'nullable|string',
        ]);

        $about->update([
            'user_id' => Auth::user()->id,
            'website_id' => $data['website_id'],
            'title' => $data['title'],
            'button_title' => $data['button_title'],
            'button_url' => $data['button_url'],
            'description_first' => $data['description_first'],
            'description_second' => $data['description_second'],
        ]);

        return redirect()->route('about.index')->with('success', 'About section updated successfully!');
    }

    public function destroy($id)
    {
        $about = About::findOrFail($id);
        $about->delete();

        return redirect()->route('about.index')->with('success', 'About section deleted successfully!');
    }
}
