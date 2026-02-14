<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Copy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'expert_id',
        'start_date',
        'end_date',
        'status',
        'total_profit',
    ];

    // Relationship with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relationship with Expert
    public function expert()
    {
        return $this->belongsTo(Expert::class);
    }
}
