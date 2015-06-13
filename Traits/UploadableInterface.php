<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

interface UploadableInterface
{
    /**
     * Get path
     *
     * @return mixed
     */
    public function getPath();

    /**
     * Set path
     *
     * @param mixed $path
     * @return UploadableInterface
     */
    public function setPath($path);

    /**
     * Get name
     *
     * @return mixed
     */
    public function getName();

    /**
     * Set name
     *
     * @param mixed $name
     * @return UploadableInterface
     */
    public function setName($name);

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType();

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return UploadableInterface
     */
    public function setMimeType($mimeType);

    /**
     * Get size
     *
     * @return string
     */
    public function getSize();

    /**
     * Set size
     *
     * @param string $size
     * @return UploadableInterface
     */
    public function setSize($size);
}