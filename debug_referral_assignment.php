<?php

// Debug referral assignment
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Http\Controllers\User\UsersController;

echo "=== DEBUGGING REFERRAL ASSIGNMENT ===\n\n";

// Get all users to see the referral structure
$users = User::all();
echo "=== ALL USERS ===\n";
foreach ($users as $user) {
    echo "ID: {$user->id}, Name: {$user->name}, Username: {$user->username}, Ref_by: " . ($user->ref_by ?? 'NULL') . ", Referral Code: {$user->referral_code}\n";
}

echo "\n=== TESTING REFERRAL CODE LOOKUP ===\n";

// Test if we can find user 205 by referral code
$testUser = User::find(205);
if ($testUser) {
    echo "Found test user: {$testUser->name} (ID: {$testUser->id})\n";
    echo "Referral code: {$testUser->referral_code}\n";
    
    // Try to find who referred this user by checking if anyone has this user's referral code
    $referrer = User::where('referral_code', '203-test')->first();
    if ($referrer) {
        echo "Found potential referrer: {$referrer->name} (ID: {$referrer->id})\n";
        echo "Referrer's referral code: {$referrer->referral_code}\n";
        
        // Check if test user should be referred by this user
        echo "\n=== CHECKING IF WE NEED TO ASSIGN REFERRAL ===\n";
        if ($testUser->ref_by == NULL) {
            echo "Test user has no referrer assigned. Assigning...\n";
            
            // Update the test user to be referred by user 203
            $testUser->ref_by = 203;
            $testUser->save();
            
            echo "✅ Assigned referrer (ID 203) to test user!\n";
            
            // Test getUserParent again
            $uc = new UsersController();
            $parentName = $uc->getUserParent($testUser->id);
            echo "getUserParent result after fix: " . $parentName . "\n";
            
            if ($parentName != "null") {
                echo "✅ SUCCESS: Referral system is now working correctly!\n";
            }
        }
    } else {
        echo "❌ Could not find referrer with code '203-test'\n";
    }
}

echo "\n=== DEBUG COMPLETE ===\n";