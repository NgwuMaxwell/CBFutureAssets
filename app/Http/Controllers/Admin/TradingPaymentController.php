<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Trade;
use Illuminate\Http\Request;

class TradingPaymentController extends Controller
{
    // Fetch and list all trades (open and closed) with pagination
    public function index()
    {
        $trades = Trade::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(20);

        return view('admin.trades.index', compact('trades'));
    }

    // Show details for a single trade
    public function show($id)
    {
        $trade = Trade::with('user')->findOrFail($id);
        return view('admin.trades.show', compact('trade'));
    }

    // Optionally, if you want to allow the admin to assign profit/loss manually (optional feature)
    public function updateProfitLoss(Request $request, $id)
    {
        $request->validate([
            'profit_loss' => 'required|numeric',
        ]);

        $trade = Trade::findOrFail($id);

        $trade->update([
            'profit_loss' => $request->profit_loss,
            'status' => 'closed',
        ]);

        return redirect()->back()->with('success', 'Profit/Loss updated successfully.');
    }
}
