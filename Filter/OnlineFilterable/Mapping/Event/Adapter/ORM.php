<?php

namespace DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping\Event\Adapter;

use Gedmo\Mapping\Event\Adapter\ORM as BaseAdapterORM;
use DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping\Event\OnlineFilterableAdapter;

/**
 * Doctrine event adapter for ORM adapted for OnlineFilterable behavior.
 */
final class ORM extends BaseAdapterORM implements OnlineFilterableAdapter
{
}