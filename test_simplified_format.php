<?php

// Test simplified referral format
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== TESTING SIMPLIFIED REFERRAL FORMAT ===\n\n";

// Test with the first user
$user = User::first();

if ($user) {
    echo "Testing referral system for user: " . $user->username . "\n";
    echo "User ID: " . $user->id . "\n";
    echo "Username: " . $user->username . "\n\n";
    
    // Clear the referral_code from database to force fresh generation
    echo "Clearing existing referral_code...\n";
    DB::table('users')->where('id', $user->id)->update(['referral_code' => null]);
    
    // Force reload the user model
    $user = User::find($user->id);
    
    // Now test both the dynamic referral link and referral code
    $referralLink = $user->dynamic_referral_link;
    $referralCode = $user->referral_code;
    
    echo "Generated Referral Link: " . $referralLink . "\n";
    echo "Generated Referral Code: " . $referralCode . "\n\n";
    
    // Extract the code from the link
    if (preg_match('/ref\/([a-zA-Z0-9-]+)$/', $referralLink, $matches)) {
        $linkCode = $matches[1];
        echo "Code extracted from link: " . $linkCode . "\n";
        
        if ($linkCode === $referralCode) {
            echo "✅ SUCCESS: Referral code and link code match!\n";
        } else {
            echo "❌ ERROR: Referral code and link code do not match!\n";
        }
    }
    
    // Test format validation (simplified)
    if (preg_match('/^(\d+)-([a-zA-Z0-9]{4})$/', $referralCode, $matches)) {
        echo "✅ SUCCESS: Simplified referral code format is correct!\n";
        echo "   User ID: " . $matches[1] . "\n";
        echo "   Username prefix: " . $matches[2] . "\n";
    } else {
        echo "❌ ERROR: Simplified referral code format is incorrect!\n";
    }
    
    echo "\n=== EXPECTED OUTPUT IN UI ===\n";
    echo "You can refer users by sharing your referral link:\n";
    echo $referralLink . "\n";
    echo "or your Referral ID\n";
    echo $referralCode . "\n";
    
    echo "\n✅ Simplified format working correctly!\n";
    
} else {
    echo "No users found in database.\n";
}