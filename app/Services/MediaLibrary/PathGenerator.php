<?php
 
 
namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\DefaultPathGenerator;

class PathGenerator extends DefaultPathGenerator
{
    public function getPath(Media $media): string
    {
        return $this->getBasePath($media).'/'.$media->collection_name.'/'.$media->id.'/';
    }
    
    protected function getBasePath(Media $media): string
    {
        $class=get_class($media->model);

        $prefix=explode('Models'.DIRECTORY_SEPARATOR,$class);
     
        return $prefix[1];
    }
}