<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'asset_type', 'asset_name', 'leverage', 'duration',
        'amount', 'action', 'expires_at', 'status', 'profit_loss','result','take_profit','stop_loss'
    ];


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'expires_at' => 'datetime', // This ensures `expires_at->format()` works
    ];
}
