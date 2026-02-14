<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('signals', function (Blueprint $table) {
            $table->id();
            $table->string('asset'); // Asset (e.g., BTC/USDT, EUR/USD)
            $table->decimal('entry_price', 15, 2);
            $table->decimal('take_profit', 15, 2);
            $table->decimal('stop_loss', 15, 2);
            $table->integer('leverage')->default(1); // Leverage
            $table->enum('status', ['active', 'closed'])->default('active');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signals');
    }
};
