<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\License;
use Illuminate\Support\Facades\Cache;

class LicenseController extends Controller
{
    public function showRequestForm()
    {
        return view('license.request');
    }

    public function validatePurchaseCode(Request $request)
    {
        $request->validate([
            'purchase_code' => 'required|string',
        ]);

        $validPurchaseCodes = ['CODE123', 'CODE456']; // Hardcoded or from a remote server

        if (!in_array($request->purchase_code, $validPurchaseCodes)) {
            return back()->with('error', 'Invalid Purchase Code');
        }

        License::whereNull('purchase_code')->update(['purchase_code' => $request->purchase_code]);

        Cache::forget('license_checked'); // Reset cache
        return redirect('/')->with('success', 'License Activated!');
    }
}
