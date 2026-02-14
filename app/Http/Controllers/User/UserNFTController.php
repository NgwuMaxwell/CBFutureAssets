<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\NFT;
use Illuminate\Support\Facades\Http;
use App\Models\Tp_Transaction;
use App\Models\Settings;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UserNFTController extends Controller
{


    public function index(Request $request)
{
    $query = NFT::query();

    if ($request->has('category') && $request->category != 'all') {
        $query->where('category', $request->category);
    }

    if ($request->has('search')) {
        $searchTerm = $request->search;
        $query->where(function ($q) use ($searchTerm) {
            $q->where('name', 'like', "%{$searchTerm}%")
              ->orWhere('category', 'like', "%{$searchTerm}%");
        });
    }

    $nfts = $query->get();
    $categories = NFT::distinct()->pluck('category');

    return view('user.nfts.gallery', compact('nfts', 'categories'));
}

    public function create()
    {
        $title = "Create NFTS";
        return view('user.nfts.create', compact('title'));
    }

    public function store(Request $request)
    {
        $settings = Settings::where('id',1)->first();
        $user = Auth::user();
        $gasFee = $settings->gasfee; // Set gas fee (can be configured)

        //Fetch Ethereum price (USD)
    $ethPrice = $this->getEthereumPrice();

    if (!$ethPrice) {
        return back()->with('message', 'Failed to fetch Ethereum price. Please try again.');
    }

        // Check if user has enough balance
        if ($user->account_bal < $gasFee* $ethPrice) {
            return back()->with('message', 'Insufficient balance to mint NFT.');
        }

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0',
            'category' => 'required|string',
            'image' => 'required|image|max:2048',
        ]);

        // Deduct gas fee from user balance
        $user->account_bal -= $gasFee* $ethPrice;
        $user->save();

        // Upload image
        $imagePath = $request->file('image')->store('nfts', 'public');

        // Store NFT details
        NFT::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category' => $request->category,
            'image' => $imagePath,
            'status' => 'available',
        ]);
        
         Tp_Transaction::create([
                'user' => $user->id,
                'plan' => "NFT Minting",
                'amount' =>  $request->price,
                'type' => "NFT",
            ]);
            
            Tp_Transaction::create([
                'user' => $user->id,
                'plan' => "NFT Minting gas fee",
                'amount' =>  $gasFee* $ethPrice,
                'type' => "NFT Gas fee",
            ]);
        

        return redirect()->route('user.nfts.index')->with('success', 'NFT Minted Successfully!');
    }


    public function gallery(Request $request)
{
    $query = NFT::where('status', 'available')->inRandomOrder(); // Randomize results

    // Filtering by category
    if ($request->has('category') && $request->category != 'all') {
        $query->where('category', $request->category);
    }

    // Searching by name or description
    if ($request->has('search')) {
        $search = $request->search;
        $query->where(function ($q) use ($search) {
            $q->where('name', 'like', "%$search%")
              ->orWhere('description', 'like', "%$search%");
        });
    }

    // Sorting
    if ($request->has('sort')) {
        if ($request->sort == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->sort == 'price_desc') {
            $query->orderBy('price', 'desc');
        }
    }

    $title = "All NFTS";

    $nfts = $query->paginate(12); // Paginate results

    $categories = NFT::select('category')->distinct()->pluck('category');

    return view('user.nfts.gallery', compact('nfts', 'categories','title'));
}

public function show($id)
{
    $nft = NFT::with('user')->findOrFail($id); // Load user data
    $title = $nft->name;
    return view('user.nfts.details', compact('nft','title'));
}


public function myNFTs()
{
    $user = Auth::user();

    $title = "My NFTS";

    // Fetch NFTs where the user is the owner (created or purchased)
    $nfts = NFT::where('user_id', $user->id)->paginate(12);

    return view('user.nfts.my', compact('nfts','title'));
}

public function sellNFT(NFT $nft)
{
    $user = Auth::user();

    // Ensure the NFT belongs to the user
    if ($nft->user_id !== $user->id) {
        return back()->with('error', 'You can only sell NFTs your own.');
    }

    // Change status to "available"
    $nft->status = 'available';
    $nft->save();
    
     
        

    return back()->with('success', 'Your NFT is now available for sale.');
}


private function getEthereumPrice()
{
    $response = Http::get('https://api.coingecko.com/api/v3/simple/price', [
        'ids' => 'ethereum',
        'vs_currencies' => 'usd',
    ]);

    if ($response->successful()) {
        return $response->json()['ethereum']['usd'];
    }

    return null;
}

}
