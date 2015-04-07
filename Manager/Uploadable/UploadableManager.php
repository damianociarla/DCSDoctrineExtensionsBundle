<?php

namespace DCS\DoctrineExtensionsBundle\Manager\Uploadable;

use Gedmo\Uploadable\UploadableListener;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadableManager
{
    private $uploadableListener;

    function __construct(UploadableListener $uploadableListener)
    {
        $this->uploadableListener = $uploadableListener;
    }

    public function addEntityFileInfo($entity, UploadedFile $fileInfo)
    {
        $this->uploadableListener->addEntityFileInfo($entity, new UploadedFileInfo($fileInfo));
    }
}