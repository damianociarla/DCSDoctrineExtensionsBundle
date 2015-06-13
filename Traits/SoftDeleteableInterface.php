<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

interface SoftDeleteableInterface
{
    /**
     * Sets deletedAt.
     *
     * @param \Datetime|null $deletedAt
     * @return SoftDeleteableInterface
     */
    public function setDeletedAt(\DateTime $deletedAt = null);

    /**
     * Returns deletedAt.
     *
     * @return \DateTime
     */
    public function getDeletedAt();

    /**
     * Is deleted?
     *
     * @return bool
     */
    public function isDeleted();
}