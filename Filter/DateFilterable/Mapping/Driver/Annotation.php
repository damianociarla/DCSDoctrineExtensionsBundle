<?php

namespace DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Driver;

use Gedmo\Exception\UnexpectedValueException;
use Gedmo\Mapping\Driver\AbstractAnnotationDriver;
use DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Validator;

class Annotation extends AbstractAnnotationDriver
{
    const DATE_FILTERABLE = 'DCS\\DoctrineExtensionsBundle\\Filter\\DateFilterable\\Mapping\\Annotation\\DateFilterable';

    /**
     * {@inheritDoc}
     */
    public function readExtendedMetadata($meta, array &$config)
    {
        $class = $this->getMetaReflectionClass($meta);

        if ($class !== null && $annot = $this->reader->getClassAnnotation($class, self::DATE_FILTERABLE)) {
            $config['dateFilterableFields'] = array();
            foreach ($annot->value as $fieldName => $properties) {
                Validator::validateField($meta, $fieldName);
                $config['dateFilterableFields'][$fieldName] = array();

                if (!isset($properties['direction'])) {
                    throw new UnexpectedValueException(sprintf('Property "direction" for the field "%s" must be declared', $fieldName));
                }
                $config['dateFilterableFields'][$fieldName]['direction'] = $properties['direction'];

                if (isset($properties['allowNull'])) {
                    if (!is_bool($properties['allowNull'])) {
                        throw new UnexpectedValueException(sprintf('Property "allowNull" for the field "%s" must be boolean type', $fieldName));
                    }
                    $config['dateFilterableFields'][$fieldName]['allowNull'] = $properties['allowNull'];
                } else {
                    $config['dateFilterableFields'][$fieldName]['allowNull'] = false;
                }
            }
        }

        $this->validateFullMetadata($meta, $config);
    }
}
