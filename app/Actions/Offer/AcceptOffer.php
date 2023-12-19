<?php

namespace App\Actions\Offer;

use App\Models\Offer;
use App\Models\Listing;
use Illuminate\Support\Facades\DB;

class AcceptOffer
{
    public static function accept(Listing $listing,Offer $offer) :void
    {
        DB::transaction(function() use($listing,$offer) {
            $offer->update(['accepted_at'=>now()]);

            $listing->offers()->whereNotIn('id',[$offer->id])->update(['rejected_at'=>now()]);
    
            $listing->update(['sold_at'=>now()]);
        });
    }
}