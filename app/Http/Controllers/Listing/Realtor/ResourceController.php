<?php

namespace App\Http\Controllers\Listing\Realtor;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\ListingRequest;
use Illuminate\Contracts\Database\Eloquent\Builder;

class ResourceController extends Controller
{
    public function index(Request $request)
    {
        $filters=['deleted'=>$request->boolean('deleted')];

        $sortQuery=$request->get('sort');

        $listings=auth()->user()->listings()
                        ->filter($filters)
                        ->sort($sortQuery)
                        ->withCount(['offers','media'=>function(Builder $query){
                            $query->where('collection_name','images');
                        }])
                        ->paginate(10)
                        ->withQueryString();
                        
        return inertia('Realtor/Listing/Index',compact('listings'));
    }

    public function create()
    {
        $this->authorize('create',Listing::class);

        return inertia('Realtor/Listing/Create');
    }

    public function store(ListingRequest $request)
    {
        $this->authorize('create',Listing::class);

        auth()->user()->listings()->create($request->validated());

        return redirect()->back()->with(['alert'=>'Listing was added']);
    }

    public function show(Listing $listing)
    {
        $listing->getMedia('images');
        
        return inertia('Realtor/Listing/Show',compact('listing'));
    }

    public function edit(Listing $listing)
    {
        $this->authorize('update',$listing);

        return inertia('Realtor/Listing/Edit',compact('listing'));
    }

    public function update(ListingRequest $request, Listing $listing)
    {
        $this->authorize('update',$listing);
        
        $listing->update($request->validated());

        return redirect()->back()->with('alert','Listings was updated');
    }

    public function destroy(Listing $listing)
    {
        $this->authorize('delete',$listing);

        $listing->delete();

        return redirect()->back()->with('alert','Listings was deleted');
    }
}
