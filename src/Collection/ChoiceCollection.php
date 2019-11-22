<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Collection;

use Lfn\Oat\QuestionApi\DataObject\Choice;
use Lfn\Oat\QuestionApi\Exception\EmptyCollectionException;
use Lfn\Oat\QuestionApi\Exception\InvalidPositionException;

/**
 * Class ChoiceCollection
 *
 * @package Lfn\Oat\QuestionApi\Test\Collection
 */
class ChoiceCollection
{
    /** @var Choice[]  */
    private $collection = [];

    /**
     * @param Choice $item
     */
    public function add(Choice $item): void
    {
        array_push($this->collection, $item);
    }

    /**
     * @param int $position
     *
     * @return Choice
     *
     * @throws EmptyCollectionException
     * @throws InvalidPositionException
     */
    public function get(int $position): Choice
    {
        if (empty($this->collection)) {
            throw new EmptyCollectionException('Collection have no items');
        }

        if (empty($this->collection[$position])) {
            throw new InvalidPositionException('Position ' . $position . ' is invalid');
        }

        return $this->collection[$position];
    }

    /**
     * @return Choice[]
     */
    public function getAll(): array
    {
        return $this->collection;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return count($this->collection);
    }

    /**
     * @inheritDoc
     */
    public function jsonSerialize(): array
    {
        return $this->collection;
    }
}
