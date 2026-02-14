<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expert extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'profile_picture',
        'win_rate',
        'min_startup_capital',
        'profit_share_percentage',
        'total_profit'
    ];

    public function copyTrades()
    {
        return $this->hasMany(CopyTrade::class);
    }


    public function copiedUsers()
{
    return $this->hasMany(Copy::class);
}

}
