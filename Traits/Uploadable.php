<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

trait Uploadable
{
    /**
     * @var string
     */
    protected $path;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $mimeType;

    /**
     * @var string
     */
    protected $size;

    /**
     * Get path
     *
     * @return mixed
     */
    public function getPath()
    {
        return $this->path;
    }

    /**
     * Set path
     *
     * @param mixed $path
     * @return Uploadable
     */
    public function setPath($path)
    {
        $this->path = $path;
        return $this;
    }

    /**
     * Get name
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set name
     *
     * @param mixed $name
     * @return Uploadable
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Get mimeType
     *
     * @return string
     */
    public function getMimeType()
    {
        return $this->mimeType;
    }

    /**
     * Set mimeType
     *
     * @param string $mimeType
     * @return Uploadable
     */
    public function setMimeType($mimeType)
    {
        $this->mimeType = $mimeType;
        return $this;
    }

    /**
     * Get size
     *
     * @return string
     */
    public function getSize()
    {
        return $this->size;
    }

    /**
     * Set size
     *
     * @param string $size
     * @return Uploadable
     */
    public function setSize($size)
    {
        $this->size = $size;
        return $this;
    }
}
