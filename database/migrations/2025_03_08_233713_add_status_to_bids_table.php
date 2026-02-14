<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('bids', function (Blueprint $table) {
        $table->string('status')->default('pending'); // Adjust type if necessary
    });
}

public function down()
{
    Schema::table('bids', function (Blueprint $table) {
        $table->dropColumn('status');
    });
}

}
