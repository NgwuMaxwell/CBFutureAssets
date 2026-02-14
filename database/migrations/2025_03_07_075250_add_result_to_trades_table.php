<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddResultToTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::table('trades', function (Blueprint $table) {
        $table->string('result')->nullable()->default('PENDING'); // WIN, LOSS, PENDING
    });
}

public function down()
{
    Schema::table('trades', function (Blueprint $table) {
        $table->dropColumn('result');
    });
}
}
