<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWalletFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            // Add separate wallet fields for different balance types
            $table->decimal('investment_wallet', 20, 8)->default('0')->after('account_bal');
            $table->decimal('earnings_wallet', 20, 8)->default('0')->after('investment_wallet');
            $table->decimal('referral_wallet', 20, 8)->default('0')->after('earnings_wallet');
            
            // Add a field to track which wallet was used for the last withdrawal
            $table->string('last_withdrawal_wallet')->nullable()->after('referral_wallet');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['investment_wallet', 'earnings_wallet', 'referral_wallet', 'last_withdrawal_wallet']);
        });
    }
}