<?php

namespace DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping;

use Gedmo\Exception\InvalidMappingException;
use Doctrine\ORM\Mapping\ClassMetadata;

/**
 * This class is used to validate mapping information
 */
class Validator
{
    /**
     * List of types which are valid for timestamp
     *
     * @var array
     */
    public static $validTypes = array(
        'date',
        'time',
        'datetime',
        'datetimetz',
        'timestamp',
        'zenddate'
    );

    public static function validateField(ClassMetadata $meta, $field)
    {
        if ($meta->isMappedSuperclass) {
            return;
        }

        $fieldMapping = $meta->getFieldMapping($field);

        if (!in_array($fieldMapping['type'], self::$validTypes)) {
            throw new InvalidMappingException(sprintf('Field "%s" must be of one of the following types: "%s"',
                $fieldMapping['type'],
                implode(', ', self::$validTypes)));
        }
    }
}
