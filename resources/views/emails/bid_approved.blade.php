@component('mail::message')
# Congratulations! Your Bid Was Approved 🎉

Dear {{ $bid->user->name }},

Your bid of **{{ number_format($bid->amount, 2) }} ETH** for the NFT **"{{ $nft->name }}"** has been **approved**!

The NFT is now yours. You can view it in your collection.

@component('mail::button', ['url' => route('user.nfts.my')])
View My NFTs
@endcomponent

Thanks for using our platform!
**{{ config('app.name') }} Team**
@endcomponent
