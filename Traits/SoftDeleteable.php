<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

trait SoftDeleteable
{
    /**
     * @var \DateTime
     */
    protected $deletedAt;

    /**
     * Sets deletedAt.
     *
     * @param \Datetime|null $deletedAt
     * @return SoftDeleteable
     */
    public function setDeletedAt(\DateTime $deletedAt = null)
    {
        $this->deletedAt = $deletedAt;
        return $this;
    }

    /**
     * Returns deletedAt.
     *
     * @return \DateTime
     */
    public function getDeletedAt()
    {
        return $this->deletedAt;
    }
    
    /**
     * Is deleted?
     * 
     * @return bool
     */
    public function isDeleted()
    {
        return null !== $this->deletedAt;
    }
}
