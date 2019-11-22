<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\Collection;

use Lfn\Oat\QuestionApi\Collection\ChoiceCollection;
use Lfn\Oat\QuestionApi\DataObject\Choice;
use Lfn\Oat\QuestionApi\Exception\EmptyCollectionException;
use Lfn\Oat\QuestionApi\Exception\InvalidPositionException;
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

        $items = $collection->getAll();

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

        $item = $collection->get(0);

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

        $this->assertSame(1, $collection->count());
        $this->assertSame($choice, $collection->get(0));
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfCollectionIsEmpty(): void
    {
        $collection = new ChoiceCollection();

        $this->expectException(EmptyCollectionException::class);

        $collection->get(0);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfItemDoesNotExits(): void
    {
        $collection = new ChoiceCollection();
        $collection->add(new Choice('text'));

        $this->expectException(InvalidPositionException::class);

        $collection->get(1);
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

        $this->assertSame('[{"text":"choice"}]', json_encode($collection->jsonSerialize()));
    }
}