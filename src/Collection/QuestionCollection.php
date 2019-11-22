<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Collection;

use JsonSerializable;
use Lfn\Oat\QuestionApi\DataObject\Question;
use Lfn\Oat\QuestionApi\Exception\EmptyCollectionException;
use Lfn\Oat\QuestionApi\Exception\InvalidPositionException;

/**
 * Class QuestionCollection
 *
 * @package Lfn\Oat\QuestionApi\Test\Collection
 */
class QuestionCollection implements JsonSerializable
{
    /** @var Question[]  */
    private $collection = [];

    /**
     * @param Question $item
     */
    public function add(Question $item): void
    {
        array_push($this->collection, $item);
    }

    /**
     * @param int $position
     *
     * @return Question
     *
     * @throws EmptyCollectionException
     * @throws InvalidPositionException
     */
    public function get(int $position): Question
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
     * @return Question[]
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
