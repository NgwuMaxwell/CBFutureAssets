<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\NFT;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;;

class BidController extends Controller
{
    //
    public function placeBid(Request $request, NFT $nft)
    {


        $ethPrice = $this->getEthereumPrice();

    if (!$ethPrice) {
        return back()->with('message', 'Failed to fetch Ethereum price. Please try again.');
    }

        $request->validate([
            'amount' => 'required|numeric',
        ]);



        if (Auth::user()->account_bal < $request->amount * $ethPrice ) {
            return back()->with('message', 'Insufficient balance to place bid.');
        }

        Bid::create([
            'nft_id' => $nft->id,
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'status' => 'pending',  // Default status
            'expires_at' => now()->addDays(2), // Bids expire in 2 days
        ]);

        return back()->with('success', 'Bid placed successfully.');
    }


    // Fetch Ethereum price from CoinGecko API
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
