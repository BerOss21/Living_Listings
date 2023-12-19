<?php

namespace App\Http\Controllers\Offer;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Scopes\ListingWasNotSoldScope;

class IndexController extends Controller
{
    public function __invoke(Request $request,$id)
    {
        $listing=Listing::withoutGlobalScope(ListingWasNotSoldScope::class)->with('offers.bidder')->whereId($id)->first();

        return inertia('Realtor/Offer/Index',compact('listing'));
    }
}
