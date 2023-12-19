<?php

namespace App\Http\Controllers\Offer;

use App\Actions\Offer\AcceptOffer;
use App\Models\Offer;
use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AcceptOfferController extends Controller
{
    public function __invoke(Listing $listing,Offer $offer)
    {
        AcceptOffer::accept($listing,$offer);

        return redirect()->back()->with('alert',"Offer #{$offer->id} accepted");
    }
}
