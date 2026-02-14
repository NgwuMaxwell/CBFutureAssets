<?php

// NFT Model
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NFT extends Model
{
    use HasFactory;
    protected $table = 'nfts';

    protected $fillable = [
        'user_id', 'name', 'description', 'price', 'category', 'image', 'status'
    ];


    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }


public function bids()
{
    return $this->hasMany(Bid::class, 'nft_id');
}

public function highestBid()
{
    return $this->bids()->orderBy('amount', 'desc')->first();
}

}
