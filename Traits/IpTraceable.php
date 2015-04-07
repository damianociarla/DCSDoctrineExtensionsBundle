<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

trait IpTraceable
{
    /**
     * @var string
     */
    protected $createdFromIp;

    /**
     * @var string
     */
    protected $updatedFromIp;

    /**
     * Sets createdFromIp.
     *
     * @param  string $createdFromIp
     * @return IpTraceable
     */
    public function setCreatedFromIp($createdFromIp)
    {
        $this->createdFromIp = $createdFromIp;
        return $this;
    }

    /**
     * Returns createdFromIp.
     *
     * @return string
     */
    public function getCreatedFromIp()
    {
        return $this->createdFromIp;
    }

    /**
     * Sets updatedFromIp.
     *
     * @param  string $updatedFromIp
     * @return IpTraceable
     */
    public function setUpdatedFromIp($updatedFromIp)
    {
        $this->updatedFromIp = $updatedFromIp;
        return $this;
    }

    /**
     * Returns updatedFromIp.
     *
     * @return string
     */
    public function getUpdatedFromIp()
    {
        return $this->updatedFromIp;
    }
}
