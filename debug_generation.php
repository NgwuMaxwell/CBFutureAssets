<?php

// Debug referral code generation
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== DEBUGGING REFERRAL CODE GENERATION ===\n\n";

// Test with the first user
$user = User::first();

if ($user) {
    echo "User: " . $user->username . " (ID: " . $user->id . ")\n";
    echo "Username: " . $user->username . "\n";
    
    // Check raw database value
    $rawUser = DB::table('users')->where('id', $user->id)->first();
    echo "Raw database referral_code: '" . ($rawUser->referral_code ?? 'NULL') . "'\n";
    
    // Check model attributes
    $attributes = $user->getAttributes();
    echo "Model attributes referral_code: '" . ($attributes['referral_code'] ?? 'NULL') . "'\n";
    
    // Test manual generation
    $userId = $user->id;
    $usernamePrefix = substr($user->username, 0, 4);
    $randomSuffix = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz0123456789'), 0, 3);
    $referralCode = "{$userId}-{$usernamePrefix}-{$randomSuffix}";
    
    echo "\nManual generation test:\n";
    echo "User ID: " . $userId . "\n";
    echo "Username prefix: '" . $usernamePrefix . "'\n";
    echo "Random suffix: '" . $randomSuffix . "'\n";
    echo "Generated code: '" . $referralCode . "'\n";
    
    // Test storing it
    echo "\nStoring referral code...\n";
    $user->referral_code = $referralCode;
    $user->save();
    
    // Reload and check
    $user = User::find($user->id);
    echo "After reload - Model referral_code: '" . ($user->referral_code ?? 'NULL') . "'\n";
    
    // Test the accessor
    echo "\nTesting getReferralCodeAttribute()...\n";
    $referralCodeFromAccessor = $user->getReferralCodeAttribute();
    echo "Accessor returned: '" . $referralCodeFromAccessor . "'\n";
    
} else {
    echo "No users found in database.\n";
}