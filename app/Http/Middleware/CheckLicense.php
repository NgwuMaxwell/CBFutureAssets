<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\License;
use Illuminate\Support\Facades\Redirect;

class CheckLicense
{
    public function handle(Request $request, Closure $next)
    {
        $host = request()->getHost(); // Get the current cPanel domain

        // Check if the domain is in the database
        $licenseCount = License::count();
        $licenseExists = License::where('cpanel_domain', $host)->exists();

        if (!$licenseExists) {
            if ($licenseCount >= 3) {
                return Redirect::route('license.request'); // Redirect to purchase code entry
            }

            // Add new cPanel if limit is not exceeded
            License::create(['cpanel_domain' => $host]);
        }

        return $next($request);
    }
}

