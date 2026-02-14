<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NFT;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class NftController extends Controller
{
    // Show all NFTs
    public function index()
    {
        $nfts = NFT::all();
        $title = 'Manage NFTS ';
        return view('admin.nfts.index', compact('nfts','title'));
    }

    // Show create NFT form
    public function create()
    {
        $title = 'Create New NFTS ';
        return view('admin.nfts.create', compact('title'));
    }

    // Store new NFT
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle file upload
        $imagePath = $request->file('image')->store('nfts', 'public');
        if (Auth::guard('admin')->check()) {
            $userId = 192; // Set to null or a specific admin user ID
        } else {
            $userId = Auth::id();
        }
        // Create NFT
        NFT::create([
            'user_id' =>$userId, // Admin ID
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
            'status' => 'available',
        ]);

        return redirect()->route('admin.nfts.index')->with('success', 'NFT created successfully!');
    }

    // Show edit form
    public function edit(NFT $nft)
    {
        $title = 'Edit NFTS ';
        return view('admin.nfts.edit', compact('nft' ,'title'));
    }

    // Update NFT
    public function update(Request $request, NFT $nft)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image
            Storage::disk('public')->delete($nft->image);

            // Upload new image
            $imagePath = $request->file('image')->store('nfts', 'public');
            $nft->image = $imagePath;
        }

        // Update NFT details
        $nft->update($request->only(['name', 'description', 'price', 'category']));

        return redirect()->route('admin.nfts.index')->with('success', 'NFT updated successfully!');
    }

    // Delete NFT
    public function destroy(NFT $nft)
    {
        // Delete image
        Storage::disk('public')->delete($nft->image);

        $nft->delete();
        return redirect()->route('admin.nfts.index')->with('success', 'NFT deleted successfully!');
    }


    public function soldNFTs()
{
    $title = "All Bought NFTS";
    $soldNFTs = NFT::where('status', 'sold')->with('user')->get();
    return view('admin.nfts.sold', compact('soldNFTs' ,'title'));
}

}

