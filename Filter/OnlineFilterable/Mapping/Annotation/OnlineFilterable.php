<?php

namespace DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * Group annotation for OnlineFilterable extension
 *
 * @Annotation
 * @Target("CLASS")
 */
final class OnlineFilterable extends Annotation
{
    /** @var string */
    public $fieldName = 'onlineAt';

    /** @var boolean */
    public $allowNull = false;
}