<?php


namespace App\Services\MediaLibrary;

use Spatie\MediaLibrary\Support\FileNamer\DefaultFileNamer;

class FileNamer extends DefaultFileNamer
{
public function originalFileName(string $fileName): string
    {
        $extLength = strlen(pathinfo($fileName, PATHINFO_EXTENSION));

        $baseName = substr($fileName, 0, strlen($fileName) - ($extLength ? $extLength + 1 : 0));

        return hash('sha256', time() . $baseName);
    }
}