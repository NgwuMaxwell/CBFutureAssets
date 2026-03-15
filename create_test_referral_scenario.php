<?php

// Create proper test referral scenario
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\User;
use App\Http\Controllers\User\UsersController;

echo "=== CREATING TEST REFERRAL SCENARIO ===\n\n";

// Check if user 203 exists
$user203 = User::find(203);
if (!$user203) {
    echo "❌ User 203 does not exist. Creating user 203...\n";
    
    // Create user 203
    $user203 = User::create([
        'name' => 'Test User 203',
        'username' => 'testuser203',
        'email' => 'test203@example.com',
        'password' => bcrypt('password123'),
        'ref_by' => NULL,
        'status' => 'active',
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    
    echo "✅ Created user 203: {$user203->name} (ID: {$user203->id})\n";
    echo "Referral Code: {$user203->referral_code}\n";
}

// Now assign user 205 to be referred by user 203
$testUser205 = User::find(205);
if ($testUser205) {
    echo "\n=== ASSIGNING REFERRAL RELATIONSHIP ===\n";
    echo "Test user 205: {$testUser205->name} (ID: {$testUser205->id})\n";
    echo "Current ref_by: " . ($testUser205->ref_by ?? 'NULL') . "\n";
    
    // Assign user 203 as referrer
    $testUser205->ref_by = 203;
    $testUser205->save();
    
    echo "✅ Assigned user 203 as referrer to user 205\n";
    
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
    echo "❌ Test user 205 not found!\n";
}

echo "\n=== FINAL VERIFICATION ===\n";
echo "User 203: {$user203->name} (Referral Code: {$user203->referral_code})\n";
echo "User 205: {$testUser205->name} (Ref_by: {$testUser205->ref_by})\n";

echo "\n=== TEST SCENARIO COMPLETE ===\n";