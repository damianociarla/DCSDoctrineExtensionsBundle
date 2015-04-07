<?php

namespace DCS\DoctrineExtensionsBundle\Manager\Uploadable;

use Gedmo\Uploadable\FileInfo\FileInfoInterface;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UploadedFileInfo implements FileInfoInterface
{
    private $uploadedFile;

    public function __construct(UploadedFile $uploadedFile)
    {
        $this->uploadedFile = $uploadedFile;
    }

    public function getTmpName()
    {
        return $this->uploadedFile->getPathname();
    }

    public function getName()
    {
        return $this->uploadedFile->getClientOriginalName();
    }

    public function getSize()
    {
        return $this->uploadedFile->getClientSize();
    }

    public function getType()
    {
        return $this->uploadedFile->getMimeType();
    }

    public function getError()
    {
        return $this->uploadedFile->getError();
    }

    public function isUploadedFile()
    {
        return is_uploaded_file($this->getTmpName());
    }
}