<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

interface BlameableInterface
{
    /**
     * Sets createdBy.
     *
     * @param  string $createdBy
     * @return BlameableInterface
     */
    public function setCreatedBy($createdBy);

    /**
     * Returns createdBy.
     *
     * @return string
     */
    public function getCreatedBy();

    /**
     * Sets updatedBy.
     *
     * @param string $updatedBy
     * @return BlameableInterface
     */
    public function setUpdatedBy($updatedBy);

    /**
     * Returns updatedBy.
     *
     * @return string
     */
    public function getUpdatedBy();
}