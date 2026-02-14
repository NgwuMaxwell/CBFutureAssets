<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bid;
use App\Models\NFT;
use Illuminate\Support\Facades\Http;
use App\Mail\BidApprovedMail;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminBidController extends Controller
{
    //

    public function bidsForApproval()
    {
        $title = "All Bids";
        $bids = Bid::where('status', 'pending')->with('nft', 'user')->orderBy('amount', 'desc')->get();
        return view('admin.bids.index', compact('bids' , 'title'));
    }

    public function approveBid($bidId)
    {

        // Fetch Ethereum price (USD)
    $ethPrice = $this->getEthereumPrice();

    if (!$ethPrice) {
        return back()->with('message', 'Failed to fetch Ethereum price. Please try again.');
    }
        $bid = Bid::findOrFail($bidId);
        $nft = NFT::findOrFail($bid->nft_id);
        $buyer = User::findOrFail($bid->user_id);
        $seller = User::findOrFail($nft->user_id); // Previous owner

        if ($buyer->account_bal < $bid->amount * $ethPrice) {
            return back()->with('message', 'Buyer does not have enough balance.');
        }

        // Deduct balance from the buyer
        $buyer->account_bal -= $bid->amount* $ethPrice;
        $buyer->save();

        // Credit the seller
        $seller->account_bal += $bid->amount* $ethPrice;
        $seller->save();

        // Transfer NFT ownership
        $nft->user_id = $buyer->id;
        $nft->status = 'sold';
        $nft->save();

        // Mark all bids for this NFT as rejected except the approved one
        Bid::where('nft_id', $nft->id)->update(['status' => 'rejected']);
        $bid->status = 'approved';
        $bid->save();
        $subject = 'Congratulations! Your Bid Was Approved ';
        Mail::to($buyer->email)->send(new BidApprovedMail($bid, $nft, $subject));
        return back()->with('success', 'Bid approved successfully. Sale finalized.');
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
