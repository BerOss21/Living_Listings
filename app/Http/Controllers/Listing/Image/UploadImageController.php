<?php

namespace App\Http\Controllers\Listing\Image;

use App\Models\Media;
use App\Models\Listing;
use App\Http\Controllers\Controller;
use App\Actions\Listing\UploadImages;
use App\Http\Requests\UploadImageRequest;


class UploadImageController extends Controller
{
    public function create(Listing $listing)
    {
        $this->authorize('update',$listing);

        $listing->getMedia('images');
        
        return inertia('Realtor/Listing/UploadImage',compact('listing'));
    }

    public function store(UploadImageRequest $request,Listing $listing)
    {
        $this->authorize('update',$listing);
  
        $images=$request->validated('images');

        UploadImages::upload($listing,$images);
        
        return redirect()->back()->with(['alert'=>'Images was uploaded']);
    }

    public function destroy(Media $media)
    {
        $this->authorize('delete',$media->model);

        $media->delete();

        return redirect()->back()->with('alert','Image deleted');
    }
}
