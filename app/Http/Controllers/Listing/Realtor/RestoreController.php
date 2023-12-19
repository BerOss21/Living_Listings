<?php

namespace App\Http\Controllers\Listing\Realtor;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;


class RestoreController extends Controller
{
    public function __invoke(Request $request,Listing $listing)
    {
        $this->authorize('restore',$listing);

        $listing->restore();

        return redirect()->back()->with(['alert'=>'Listing was restored']);
    }
}
