<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('user_signal_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Subscribed user
            $table->foreignId('signal_plan_id')->constrained()->onDelete('cascade'); // Subscribed plan
            $table->date('expires_at'); // Subscription expiration date
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('user_signal_subscriptions');
    }
};
