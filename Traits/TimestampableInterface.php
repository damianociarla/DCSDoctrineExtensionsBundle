<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

interface TimestampableInterface
{
    /**
     * Sets createdAt.
     *
     * @param  \DateTime $createdAt
     * @return TimestampableInterface
     */
    public function setCreatedAt(\DateTime $createdAt);

    /**
     * Returns createdAt.
     *
     * @return \DateTime
     */
    public function getCreatedAt();

    /**
     * Sets updatedAt.
     *
     * @param  \DateTime $updatedAt
     * @return TimestampableInterface
     */
    public function setUpdatedAt(\DateTime $updatedAt);

    /**
     * Returns updatedAt.
     *
     * @return \DateTime
     */
    public function getUpdatedAt();
}