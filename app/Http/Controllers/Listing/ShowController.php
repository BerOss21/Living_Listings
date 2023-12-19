<?php

namespace App\Http\Controllers\Listing;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function __invoke(Request $request,$id)
    {
        $listing=Listing::whereNull('sold_at')->whereId($id)->firstOrFail();
        
        $listing->getMedia('images');

        $offer=auth()->check()?$listing->offers()->where('bidder_id',auth()->id())->first():null;
        
        return inertia('Listing/Show',compact('listing','offer'));
    }
}
