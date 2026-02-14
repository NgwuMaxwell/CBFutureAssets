<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SignalSubscription extends Model
{
    use HasFactory;

    protected $table = 'user_signal_subscriptions'; // Explicitly define the table name

    protected $fillable = [
        'user_id',
        'signal_plan_id',
        'expires_at',
        'status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function signalPlan()
    {
        return $this->belongsTo(SignalPlan::class);
    }
    public function plan()
{
    return $this->belongsTo(SignalPlan::class, 'signal_plan_id');
}
}
