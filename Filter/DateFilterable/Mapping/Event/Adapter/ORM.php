<?php

namespace DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Event\Adapter;

use Gedmo\Mapping\Event\Adapter\ORM as BaseAdapterORM;
use DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Event\DateFilterableAdapter;

/**
 * Doctrine event adapter for ORM adapted for DateFilterable behavior.
 */
final class ORM extends BaseAdapterORM implements DateFilterableAdapter
{
}