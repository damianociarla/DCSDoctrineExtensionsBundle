<?php

namespace DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable;

/**
 * This interface is not necessary but can be implemented for
 * Domain Objects which in some cases needs to be identified as
 * OnlineFilterable
 */
interface OnlineFilterable
{
    /**
     * to mark the class as OnlineFilterable use class annotation
     * @DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping\Annotation\OnlineFilterable
     */
}