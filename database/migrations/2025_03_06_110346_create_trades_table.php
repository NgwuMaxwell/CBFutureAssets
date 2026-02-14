<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTradesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trades', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Links to users table
            $table->string('asset_type'); // stock, crypto, forex
            $table->string('asset_name'); // e.g., BTCUSD, EURUSD, TSLA
            $table->enum('action', ['buy', 'sell']);
            $table->decimal('amount', 15, 2); // Amount placed on the trade
            $table->integer('leverage'); // e.g., 10x leverage
            $table->integer('duration'); // Duration in minutes/hours
            $table->timestamp('expires_at')->nullable(); // Trade expiry timestamp
            $table->enum('status', ['open', 'closed'])->default('open'); // Trade status
            $table->decimal('profit_loss', 15, 2)->nullable(); // Admin sets profit or loss
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trades');
    }
}
