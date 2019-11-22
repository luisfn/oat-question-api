<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\Collection;

use PHPUnit\Framework\TestCase;

/**
 * Class ChoiceCollectionTest
 *
 * @package Lfn\Oat\QuestionApi\Test\Collection
 */
class ChoiceCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldGetAllItems(): void
    {
        $collection = new ChoiceCollection();
        $choice     = new Choice('choice');
        $collection->add($choice);

        $items = $this->collection->getAll();

        self::assertSame([$choice], $items);
    }

    /**
     * @test
     */
    public function shouldGetSingleItem(): void
    {
        $collection = new ChoiceCollection();
        $choice     = new Choice('choice');
        $collection->add($choice);

        $item = $this->collection->get(0);

        self::assertSame($choice, $item);
    }

    /**
     * @test
     */
    public function shouldAddItem(): void
    {
        $collection = new ChoiceCollection();
        $choice     = new Choice('choice');

        $collection->add($choice);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfCollectionIsEmpty(): void
    {
        $collection = new ChoiceCollection();
        $collection->get(0);

        $this->expectException('EmptyCollection');
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfItemDoesNotExits(): void
    {
        $collection = new ChoiceCollection();
        $collection->get(0);

        $this->expectException('ItemNotFound');
    }

    /**
     * @test
     */
    public function shouldGetItemCount(): void
    {
        $collection = new ChoiceCollection();
        $choice     = new Choice('choice');

        $collection->add($choice);

        $this->assertSame(1, $collection->count());
    }

    /**
     * @test
     */
    public function shouldSerializeToJson(): void
    {
        $collection = new ChoiceCollection();
        $choice     = new Choice('choice');

        $collection->add($choice);

        $this->assertSame('{}', $collection->jsonSerialize());
    }
}