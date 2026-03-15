<?php

// Simple debug script to check referral system
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

// Test with the first user
$user = User::first();

if ($user) {
    echo "Testing referral system for user: " . $user->username . "\n";
    echo "User ID: " . $user->id . "\n";
    
    // Check if referral_code field exists in the model
    $attributes = $user->getAttributes();
    echo "Available attributes: " . implode(", ", array_keys($attributes)) . "\n";
    
    // Check if referral_code is in the database
    $rawUser = DB::table('users')->where('id', $user->id)->first();
    echo "Database referral_code: " . ($rawUser->referral_code ?? 'NULL') . "\n";
    
    // Test setting referral_code directly
    if (empty($user->referral_code)) {
        echo "Setting referral_code manually...\n";
        $user->referral_code = "test-123";
        $user->save();
        echo "Saved referral_code: " . $user->referral_code . "\n";
    }
    
    // Test referral code generation
    $referralCode = $user->referral_code;
    echo "Referral Code: " . $referralCode . "\n";
    
    // Test dynamic referral link
    $referralLink = $user->dynamic_referral_link;
    echo "Referral Link: " . $referralLink . "\n";
    
    // Verify they match
    if (strpos($referralLink, $referralCode) !== false) {
        echo "✅ SUCCESS: Referral code matches link!\n";
    } else {
        echo "❌ ERROR: Referral code does not match link!\n";
    }
} else {
    echo "No users found in database.\n";
}