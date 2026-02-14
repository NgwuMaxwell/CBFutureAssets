<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('signal_plans', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Plan name (e.g., Basic, Pro, VIP)
            $table->decimal('price', 15, 2); // Subscription cost
            $table->integer('duration'); // Duration in days
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('signal_plans');
    }
};

