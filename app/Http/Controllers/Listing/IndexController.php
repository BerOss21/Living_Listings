<?php

namespace App\Http\Controllers\Listing;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke(Request $request)
    {
        $filters=$request->only('price_from','price_to','area_from','area_to','beds','baths');

        $listings=Listing::filter($filters)
                        ->with('user')
                        ->whereNull('sold_at')
                        ->latest()
                        ->paginate(10)
                        ->withQueryString();

        return inertia('Listing/Index',compact('listings','filters'));
    }
}
