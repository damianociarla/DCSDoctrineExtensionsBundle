<?php

namespace DCS\DoctrineExtensionsBundle\Filter\DateFilterable;

/**
 * This interface is not necessary but can be implemented for
 * Domain Objects which in some cases needs to be identified as
 * DateFilterable
 */
interface DateFilterable
{
    /**
     * to mark the class as DateFilterable use class annotation
     * @DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Annotation\DateFilterable
     *
     * example
     * @DateFilterable({
     *   "onlineAt" = {
     *     "direction" : "GTE",
     *     "allowNull" : false
     *   },
     *   "offlineAt" = {
     *     "direction" : "LTE",
     *     "allowNull" : false
     *   }
     * })
     */
}