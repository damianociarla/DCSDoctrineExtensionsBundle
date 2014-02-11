<?php

namespace DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Annotation;

use Doctrine\Common\Annotations\Annotation;

/**
 * Group annotation for DateFilterable extension
 *
 * @Annotation
 * @Target("CLASS")
 */
final class DateFilterable extends Annotation
{
    const DIRECTION_GTE = 'GTE';
    const DIRECTION_GT  = 'GT';
    const DIRECTION_LTE = 'LTE';
    const DIRECTION_LT  = 'LT';
}