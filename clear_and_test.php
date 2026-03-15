<?php

// Clear referral_code and test proper generation
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
    echo "Clearing referral_code and testing proper generation...\n";
    
    // Clear the referral_code from database
    DB::table('users')->where('id', $user->id)->update(['referral_code' => null]);
    
    // Now test the proper generation
    $referralCode = $user->referral_code;
    echo "Generated Referral Code: " . $referralCode . "\n";
    
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
    
    // Test format validation
    if (preg_match('/^(\d+)-([a-zA-Z0-9]{4})-([a-zA-Z0-9]{3})$/', $referralCode, $matches)) {
        echo "✅ SUCCESS: Referral code format is correct!\n";
        echo "   User ID: " . $matches[1] . "\n";
        echo "   Username prefix: " . $matches[2] . "\n";
        echo "   Random suffix: " . $matches[3] . "\n";
    } else {
        echo "❌ ERROR: Referral code format is incorrect!\n";
    }
    
} else {
    echo "No users found in database.\n";
}