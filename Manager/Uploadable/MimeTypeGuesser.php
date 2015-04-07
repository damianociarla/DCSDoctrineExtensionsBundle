<?php

namespace DCS\DoctrineExtensionsBundle\Manager\Uploadable;

use Gedmo\Uploadable\MimeType\MimeTypeGuesserInterface;
use Symfony\Component\HttpFoundation\File\MimeType\MimeTypeGuesser as SymfonyMimeTypeGuesser;

class MimeTypeGuesser implements MimeTypeGuesserInterface
{
    public function guess($filePath)
    {
        return SymfonyMimeTypeGuesser::getInstance()->guess($filePath);
    }
}