<?php

namespace DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping\Driver;

use Gedmo\Exception\UnexpectedValueException;
use Gedmo\Mapping\Driver\AbstractAnnotationDriver;
use DCS\DoctrineExtensionsBundle\Filter\OnlineFilterable\Mapping\Validator;

class Annotation extends AbstractAnnotationDriver
{
    /**
     * Annotation to define that this object is loggable
     */
    const ONLINE_FILTERABLE = 'DCS\\DoctrineExtensionsBundle\\Filter\\OnlineFilterable\\Mapping\\Annotation\\OnlineFilterable';

    /**
     * {@inheritDoc}
     */
    public function readExtendedMetadata($meta, array &$config)
    {
        $class = $this->getMetaReflectionClass($meta);

        // class annotations
        if ($class !== null && $annot = $this->reader->getClassAnnotation($class, self::ONLINE_FILTERABLE)) {
            $config['onlineFilterable'] = true;

            Validator::validateField($meta, $annot->fieldName);
            $config['fieldName'] = $annot->fieldName;

            if (!is_bool($annot->allowNull)) {
                throw new UnexpectedValueException(sprintf('Property "allowNull" for the class "%s" must be boolean type', self::ONLINE_FILTERABLE));
            }

            $config['allowNull'] = $annot->allowNull;
        }

        $this->validateFullMetadata($meta, $config);
    }
}
