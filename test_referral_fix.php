<?php

// Test referral system fix
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Http\Controllers\User\UsersController;

echo "=== TESTING REFERRAL SYSTEM FIX ===\n\n";

// Get test user (user 205 - test2)
$testUser = User::find(205);
if ($testUser) {
    echo "Test User: " . $testUser->name . " (ID: " . $testUser->id . ")\n";
    echo "Referral Code: " . $testUser->referral_code . "\n";
    echo "Ref By (ID): " . ($testUser->ref_by ?? 'NULL') . "\n";
    
    if ($testUser->ref_by) {
        $referrer = User::find($testUser->ref_by);
        if ($referrer) {
            echo "Referrer: " . $referrer->name . " (ID: " . $referrer->id . ")\n";
            echo "Referrer Code: " . $referrer->referral_code . "\n";
        } else {
            echo "❌ ERROR: Referrer not found!\n";
        }
    } else {
        echo "❌ ERROR: No referrer assigned!\n";
    }
    
    echo "\n=== Testing getUserParent Method ===\n";
    $uc = new UsersController();
    $parentName = $uc->getUserParent($testUser->id);
    echo "getUserParent result: " . $parentName . "\n";
    
    if ($parentName != "null") {
        echo "✅ SUCCESS: Referral system is working correctly!\n";
        echo "The user should now see their referrer's name instead of 'null'.\n";
    } else {
        echo "❌ ERROR: Still showing 'null' for referrer.\n";
    }
    
} else {
    echo "❌ ERROR: Test user (ID 205) not found!\n";
}

echo "\n=== REFERRAL SYSTEM TEST COMPLETE ===\n";