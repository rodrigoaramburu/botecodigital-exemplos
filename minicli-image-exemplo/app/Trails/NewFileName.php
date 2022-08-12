<?php declare(strict_types=1);

namespace App\Trails;


trait NewFileName
{
    public function newFileName(string $fileOrigin, string $suffix = 'resize'): string
    {
        $fileInfo = pathinfo($fileOrigin);

        return $fileInfo['dirname'].'/'.$fileInfo['filename'].'-'.$suffix.'.'.$fileInfo['extension'];
    }
}