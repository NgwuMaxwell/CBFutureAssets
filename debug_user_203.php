<?php

// Debug specific user with ID 203
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== DEBUGGING USER ID 203 ===\n\n";

// Get user with ID 203
$user = User::find(203);

if ($user) {
    echo "User found: " . $user->username . " (ID: " . $user->id . ")\n";
    
    // Check current database value
    $dbUser = DB::table('users')->where('id', $user->id)->first();
    echo "Current database referral_code: '" . ($dbUser->referral_code ?? 'NULL') . "'\n";
    
    // Check model attributes
    echo "Model attributes referral_code: '" . ($user->getAttributes()['referral_code'] ?? 'NULL') . "'\n";
    
    // Clear the referral_code from database
    echo "\nClearing referral_code from database...\n";
    DB::table('users')->where('id', $user->id)->update(['referral_code' => null]);
    
    // Force reload user model
    $user = User::find($user->id);
    
    // Now test both the dynamic referral link and referral code
    $referralLink = $user->dynamic_referral_link;
    $referralCode = $user->referral_code;
    
    echo "\nAfter refresh:\n";
    echo "Generated Referral Link: " . $referralLink . "\n";
    echo "Generated Referral Code: " . $referralCode . "\n";
    
    // Extract the code from the link
    if (preg_match('/ref\/([a-zA-Z0-9-]+)$/', $referralLink, $matches)) {
        $linkCode = $matches[1];
        echo "Code extracted from link: " . $linkCode . "\n";
        
        if ($linkCode === $referralCode) {
            echo "✅ SUCCESS: Referral code and link code match!\n";
        } else {
            echo "❌ ERROR: Referral code and link code do not match!\n";
            echo "   Link code: " . $linkCode . "\n";
            echo "   Referral code: " . $referralCode . "\n";
        }
    }
    
    // Check database again
    $dbUser = DB::table('users')->where('id', $user->id)->first();
    echo "Database referral_code after generation: '" . $dbUser->referral_code . "'\n";
    
} else {
    echo "User with ID 203 not found in database.\n";
}