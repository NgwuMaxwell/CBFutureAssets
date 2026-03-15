<?php

// Debug accessor method
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use Illuminate\Support\Facades\DB;

echo "=== DEBUGGING ACCESSOR METHOD ===\n\n";

// Test with the first user
$user = User::first();

if ($user) {
    echo "User: " . $user->username . " (ID: " . $user->id . ")\n";
    
    // Clear the referral_code from database
    echo "Clearing referral_code from database...\n";
    DB::table('users')->where('id', $user->id)->update(['referral_code' => null]);
    
    // Reload user
    $user = User::find($user->id);
    
    echo "Raw database value: '" . (DB::table('users')->where('id', $user->id)->first()->referral_code ?? 'NULL') . "'\n";
    echo "Model attributes: '" . ($user->getAttributes()['referral_code'] ?? 'NULL') . "'\n";
    
    // Test direct accessor call
    echo "\nCalling getReferralCodeAttribute() directly...\n";
    $referralCode = $user->getReferralCodeAttribute();
    echo "Direct accessor returned: '" . $referralCode . "'\n";
    
    // Test property access
    echo "\nAccessing ->referral_code property...\n";
    $referralCodeProperty = $user->referral_code;
    echo "Property access returned: '" . $referralCodeProperty . "'\n";
    
    // Check if it was saved to database
    $user = User::find($user->id);
    echo "\nAfter reload - Database value: '" . (DB::table('users')->where('id', $user->id)->first()->referral_code ?? 'NULL') . "'\n";
    echo "After reload - Property access: '" . $user->referral_code . "'\n";
    
} else {
    echo "No users found in database.\n";
}