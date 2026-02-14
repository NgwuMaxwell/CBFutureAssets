<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Expert;
use Illuminate\Support\Facades\Storage;

class ExpertController extends Controller
{
    public function index()
    {
        $experts = Expert::all();
        $title = 'Manage Copy Trading Expert';
        return view('admin.experts.index', compact('experts', 'title'));
    }

    public function create()
    {
        $title = 'Create New Expert';
        return view('admin.experts.create', compact('title'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'win_rate' => 'required|numeric|min:0|max:100',
            'profit_share_percentage' => 'required|numeric|min:0|max:100',
            'min_startup_capital' => 'required|numeric|min:0',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $expert = new Expert($request->only([
            'name', 'win_rate', 'profit_share_percentage', 'min_startup_capital'
        ]));

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('experts', 'public');
            $expert->profile_picture = $path;
        }

        $expert->save();

        return redirect()->route('admin.experts.index')->with('success', 'Expert added successfully.');
    }

    public function edit($id)
    {
        $expert = Expert::findOrFail($id);
        $title = 'Update Copy Expert';
        return view('admin.experts.edit', compact('expert' ,'title'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'win_rate' => 'required|numeric|min:0|max:100',
            'profit_share_percentage' => 'required|numeric|min:0|max:100',
            'min_startup_capital' => 'required|numeric|min:0',
            'profile_picture' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $expert = Expert::findOrFail($id);
        $expert->fill($request->only([
            'name', 'win_rate', 'profit_share_percentage', 'min_startup_capital'
        ]));

        if ($request->hasFile('profile_picture')) {
            if ($expert->profile_picture) {
                Storage::disk('public')->delete($expert->profile_picture);
            }
            $path = $request->file('profile_picture')->store('experts', 'public');
            $expert->profile_picture = $path;
        }

        $expert->save();

        return redirect()->route('admin.experts.index')->with('success', 'Expert updated successfully.');
    }

    public function destroy($id)
    {
        $expert = Expert::findOrFail($id);
        if ($expert->profile_picture) {
            Storage::disk('public')->delete($expert->profile_picture);
        }
        $expert->delete();

        return redirect()->route('admin.experts.index')->with('success', 'Expert deleted successfully.');
    }
}
