<?php

// Simple test script to verify referral system
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;

// Test with the first user
$user = User::first();

if ($user) {
    echo "Testing referral system for user: " . $user->username . "\n";
    echo "User ID: " . $user->id . "\n";
    
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
    
    // Test parsing the referral code
    $parsedUser = User::getUserByReferralCode($referralCode);
    if ($parsedUser && $parsedUser->id == $user->id) {
        echo "✅ SUCCESS: Referral code parsing works!\n";
    } else {
        echo "❌ ERROR: Referral code parsing failed!\n";
    }
} else {
    echo "No users found in database.\n";
}