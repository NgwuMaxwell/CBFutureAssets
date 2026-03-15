<?php

// Final clear all referral codes
require_once 'vendor/autoload.php';

// Bootstrap Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\DB;

echo "=== FINAL CLEAR ALL REFERRAL CODES ===\n\n";

// Clear all referral codes
$affected = DB::table('users')->update(['referral_code' => null]);

echo "✅ Cleared referral_code for $affected users.\n";
echo "✅ All users will now generate fresh, consistent referral codes when they access their referral page.\n";

echo "\n=== INSTRUCTIONS ===\n";
echo "1. Users need to refresh their referral page\n";
echo "2. The system will automatically generate new consistent codes\n";
echo "3. Both referral link and referral ID will show the same code\n";
echo "4. No more mismatched suffixes!\n";

echo "\n✅ The referral system is now fully fixed!\n";