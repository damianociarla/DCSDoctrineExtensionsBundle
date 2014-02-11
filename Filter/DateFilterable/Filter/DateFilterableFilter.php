<?php

namespace DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Filter;

use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query\Filter\SQLFilter;
use DCS\DoctrineExtensionsBundle\Filter\DateFilterable\DateFilterableListener;
use DCS\DoctrineExtensionsBundle\Filter\DateFilterable\Mapping\Annotation\DateFilterable;
use Gedmo\Exception\UnexpectedValueException;

class DateFilterableFilter extends SQLFilter
{
    protected $listener;
    protected $entityManager;
    protected $disabled = array();

    public function addFilterConstraint(ClassMetadata $meta, $targetTableAlias)
    {
        $class = $meta->getName();

        if (array_key_exists($class, $this->disabled) && $this->disabled[$class] === true) {
            return '';
        } elseif (array_key_exists($meta->rootEntityName, $this->disabled) && $this->disabled[$meta->rootEntityName] === true) {
            return '';
        }

        $config = $this->getListener()->getConfiguration($this->getEntityManager(), $meta->name);

        if (!isset($config['dateFilterableFields']) || !is_array($config['dateFilterableFields'])) {
            return '';
        }

        $sqlConditions = array();

        $conn = $this->getEntityManager()->getConnection();
        $platform = $conn->getDatabasePlatform();

        foreach ($config['dateFilterableFields'] as $fieldName => $property) {
            $column = $meta->getQuotedColumnName($fieldName, $platform);

            $subquery = array();

            if ($property['allowNull']) {
                $subquery[] = $platform->getIsNullExpression($targetTableAlias.'.'.$column);
            }

            $sqlOperator = $this->getSqlOperator($property['direction']);
            $date = $conn->quote(date('Y-m-d H:i:s'));
            $subquery[] = "{$targetTableAlias}.{$column} {$sqlOperator} {$date}";

            $sqlConditions[] = '('.implode(' OR ', $subquery).')';
        }

        return '('.implode(' AND ', $sqlConditions).')';
    }

    public function disableForEntity($class)
    {
        $this->disabled[$class] = true;
    }

    public function enableForEntity($class)
    {
        $this->disabled[$class] = false;
    }

    protected function getSqlOperator($code)
    {
        switch ($code) {
            case DateFilterable::DIRECTION_GTE:
                return '>=';
                break;
            case DateFilterable::DIRECTION_GT:
                return '>';
                break;
            case DateFilterable::DIRECTION_LTE:
                return '<=';
                break;
            case DateFilterable::DIRECTION_LT:
                return '<';
                break;
            default:
                throw new UnexpectedValueException(sprintf('Direction "%s" is not supported', $code));
                break;
        }
    }

    protected function getListener()
    {
        if ($this->listener === null) {
            $em = $this->getEntityManager();
            $evm = $em->getEventManager();

            foreach ($evm->getListeners() as $listeners) {
                foreach ($listeners as $listener) {
                    if ($listener instanceof DateFilterableListener) {
                        $this->listener = $listener;

                        break 2;
                    }
                }
            }

            if ($this->listener === null) {
                throw new \RuntimeException('Listener "DateFilterableListener" was not added to the EventManager!');
            }
        }

        return $this->listener;
    }

    protected function getEntityManager()
    {
        if ($this->entityManager === null) {
            $refl = new \ReflectionProperty('Doctrine\ORM\Query\Filter\SQLFilter', 'em');
            $refl->setAccessible(true);
            $this->entityManager = $refl->getValue($this);
        }

        return $this->entityManager;
    }
}
