<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SomeController extends Controller
{
    public function changetheme(Request $request)
    {
        // Handle theme change logic
        $theme = $request->input('theme');
        
        // Update user's theme preference
        auth()->user()->update([
            'theme' => $theme
        ]);

        return redirect()->back()->with('success', 'Theme updated successfully!');
    }
}