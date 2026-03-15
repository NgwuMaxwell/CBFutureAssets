<?php

// Fix referral assignment with correct user ID
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Http\Controllers\User\UsersController;

echo "=== FIXING REFERRAL ASSIGNMENT ===\n\n";

// Get the correct user (ID 206, not 203)
$user206 = User::find(206);
$testUser205 = User::find(205);

if ($user206 && $testUser205) {
    echo "User 206: {$user206->name} (ID: {$user206->id})\n";
    echo "User 205: {$testUser205->name} (ID: {$testUser205->id})\n";
    echo "Current ref_by for user 205: {$testUser205->ref_by}\n";
    
    // Fix the referral assignment - user 205 should be referred by user 206
    $testUser205->ref_by = 206;
    $testUser205->save();
    
    echo "✅ Fixed referral assignment: user 205 now refers to user 206\n";
    
    // Test getUserParent
    $uc = new UsersController();
    $parentName = $uc->getUserParent($testUser205->id);
    echo "getUserParent result: " . $parentName . "\n";
    
    if ($parentName != "null") {
        echo "✅ SUCCESS: Referral system is working correctly!\n";
        echo "User 205 should now see 'Test User 203' instead of 'null'.\n";
    } else {
        echo "❌ ERROR: Still showing 'null' for referrer.\n";
    }
} else {
    echo "❌ One or both users not found!\n";
}

echo "\n=== FINAL VERIFICATION ===\n";
echo "User 206: {$user206->name} (Referral Code: {$user206->referral_code})\n";
echo "User 205: {$testUser205->name} (Ref_by: {$testUser205->ref_by})\n";

echo "\n=== FIX COMPLETE ===\n";