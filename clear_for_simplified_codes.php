<?php

// Clear all referral codes for simplified format
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== CLEARING ALL REFERRAL CODES FOR SIMPLIFIED FORMAT ===\n\n";

// Clear all referral codes
$affected = DB::table('users')->update(['referral_code' => null]);

echo "✅ Cleared referral_code for $affected users.\n";
echo "✅ All users will now generate simplified referral codes when they access their referral page.\n";

echo "\n=== NEW SIMPLIFIED FORMAT ===\n";
echo "Old format: 203-test-abc (user_id-username_prefix-random_suffix)\n";
echo "New format: 203-test   (user_id-username_prefix)\n";

echo "\n=== INSTRUCTIONS ===\n";
echo "1. Users need to refresh their referral page\n";
echo "2. The system will automatically generate simplified consistent codes\n";
echo "3. Both referral link and referral ID will show the same simple code\n";
echo "4. No more random suffixes!\n";

echo "\n✅ The referral system is now simplified and fixed!\n";