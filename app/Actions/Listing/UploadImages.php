<?php


namespace App\Actions\Listing;
use App\Models\Listing;

class UploadImages
{

   /**
     * Upload multiple listing images using spatie media library.
     *
     * @param  array<int,\Illuminate\Http\UploadedFile>  $images
     */

    public static function upload(Listing $listing,array $images) :void
    {
        foreach($images as $image)
        {
            $listing->addMedia($image)->toMediaCollection('images');
        }
    }
}