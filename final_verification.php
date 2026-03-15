<?php

// Final verification test
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== FINAL VERIFICATION TEST ===\n\n";

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
    
    // Now test the dynamic referral link and referral code
    $referralLink = $user->dynamic_referral_link;
    $referralCode = $user->referral_code;
    
    echo "Generated Referral Link: " . $referralLink . "\n";
    echo "Generated Referral Code: " . $referralCode . "\n\n";
    
    // Verify they match
    if (strpos($referralLink, $referralCode) !== false) {
        echo "✅ SUCCESS: Referral code matches link!\n";
    } else {
        echo "❌ ERROR: Referral code does not match link!\n";
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
    
    echo "\n=== EXPECTED OUTPUT IN UI ===\n";
    echo "You can refer users by sharing your referral link:\n";
    echo $referralLink . "\n";
    echo "or your Referral ID\n";
    echo $referralCode . "\n";
    
    echo "\n✅ The referral ID should now display correctly!\n";
    
} else {
    echo "No users found in database.\n";
}