<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

interface UploadableEntityInterface
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
     * @return UploadableEntityInterface
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
     * @return UploadableEntityInterface
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
     * @return UploadableEntityInterface
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
     * @return UploadableEntityInterface
     */
    public function setSize($size);
}