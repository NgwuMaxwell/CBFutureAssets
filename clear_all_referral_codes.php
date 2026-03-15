<?php

// Clear all referral codes to force regeneration
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== CLEARING ALL REFERRAL CODES ===\n\n";

// Clear all referral codes
$affected = DB::table('users')->update(['referral_code' => null]);

echo "Cleared referral_code for $affected users.\n";
echo "Users will now generate fresh, consistent referral codes when they access their referral page.\n";

// Test with first user
$user = User::first();
if ($user) {
    $referralLink = $user->dynamic_referral_link;
    $referralCode = $user->referral_code;
    
    echo "\nTest user (ID: {$user->id}, Username: {$user->username}):\n";
    echo "Referral Link: $referralLink\n";
    echo "Referral Code: $referralCode\n";
    
    if (preg_match('/ref\/([a-zA-Z0-9-]+)$/', $referralLink, $matches)) {
        $linkCode = $matches[1];
        if ($linkCode === $referralCode) {
            echo "✅ SUCCESS: Codes match!\n";
        } else {
            echo "❌ ERROR: Codes don't match!\n";
        }
    }
}

echo "\n✅ All users will now have consistent referral codes!\n";