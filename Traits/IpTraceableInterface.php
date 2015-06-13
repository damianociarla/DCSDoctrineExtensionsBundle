<?php

namespace DCS\DoctrineExtensionsBundle\Traits;

interface IpTraceableInterface
{
    /**
     * Sets createdFromIp.
     *
     * @param  string $createdFromIp
     * @return IpTraceableInterface
     */
    public function setCreatedFromIp($createdFromIp);

    /**
     * Returns createdFromIp.
     *
     * @return string
     */
    public function getCreatedFromIp();

    /**
     * Sets updatedFromIp.
     *
     * @param  string $updatedFromIp
     * @return IpTraceableInterface
     */
    public function setUpdatedFromIp($updatedFromIp);

    /**
     * Returns updatedFromIp.
     *
     * @return string
     */
    public function getUpdatedFromIp();
}