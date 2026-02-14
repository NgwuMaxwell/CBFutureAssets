<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NFT;
use App\Models\User; // Import User model
use App\Models\Tp_Transaction;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
class BuyController extends Controller
{
    //

    public function buyNFT(NFT $nft)
{
    // Fetch Ethereum price (USD)
    $ethPrice = $this->getEthereumPrice();

    if (!$ethPrice) {
        return back()->with('message', 'Failed to fetch Ethereum price. Please try again.');
    }

    // Calculate total cost in USD
    $totalCost = $nft->price * $ethPrice;

    // Get current authenticated user (buyer)
    $buyer = Auth::user();

    // Ensure buyer has enough balance
    if ($buyer->account_bal < $totalCost) {
        return back()->with('message', 'Insufficient balance.');
    }

    $seller = User::where('id', $nft->user_id)->first();
    // Ensure the NFT model has `owner()` relationship

    if ($seller) {
        // Credit the seller
        $seller->account_bal += $totalCost;
        $seller->save();
    }

    // Deduct from buyer's balance
    $buyer->account_bal -= $totalCost;
    $buyer->save();

    // Transfer ownership
    $nft->user_id = $buyer->id;
    $nft->status = 'sold';
    $nft->save();

      Tp_Transaction::create([
                'user' => $nft->user_id,
                'plan' => " $nft->name NFT Buy",
                'amount' =>  $nft->amount,
                'type' => "Buy NFT",
            ]);

    return redirect()->route('user.nfts.my')->with('success', 'NFT purchased successfully. Seller has been credited.');
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
