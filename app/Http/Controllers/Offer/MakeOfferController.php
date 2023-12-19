<?php

namespace App\Http\Controllers\Offer;

use App\Events\OfferMadeEvent;
use App\Models\Listing;
use App\Http\Requests\OfferRequest;
use App\Http\Controllers\Controller;
use App\Notifications\OfferMadeNotification;

class MakeOfferController extends Controller
{
    public function __invoke(OfferRequest $request,Listing $listing)
    {
        $listing->bidders()->attach(auth()->id(), ['amount' => $request->validated('amount')]);

        event(new OfferMadeEvent($listing,auth()->id()));

        return redirect()->back()->with('alert','Offer made');
    }
}
