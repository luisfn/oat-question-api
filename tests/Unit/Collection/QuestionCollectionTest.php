<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\Collection;

use DateTime;
use PHPUnit\Framework\TestCase;

/**
 * Class QuestionCollectionTest
 *
 * @package Lfn\Oat\QuestionApi\Test\Collection
 */
class QuestionCollectionTest extends TestCase
{
    /**
     * @test
     */
    public function shouldGetAllItems(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question'. new DateTime(), new ChoiceCollection());
        $collection->add($question);

        $items = $this->collection->getAll();

        self::assertSame([$question], $items);
    }

    /**
     * @test
     */
    public function shouldGetSingleItem(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question'. new DateTime(), new ChoiceCollection());
        $collection->add($question);

        $item = $this->collection->get(0);

        self::assertSame($question, $item);
    }

    /**
     * @test
     */
    public function shouldAddItem(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question'. new DateTime(), new ChoiceCollection());

        $collection->add($question);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfCollectionIsEmpty(): void
    {
        $collection = new QuestionCollection();
        $collection->get(0);

        $this->expectException('EmptyCollection');
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfItemDoesNotExits(): void
    {
        $collection = new QuestionCollection();
        $collection->get(0);

        $this->expectException('ItemNotFound');
    }

    /**
     * @test
     */
    public function shouldGetItemCount(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question'. new DateTime(), new ChoiceCollection());

        $collection->add($question);

        $this->assertSame(1, $collection->count());
    }

    /**
     * @test
     */
    public function shouldSerializeToJson(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question'. new DateTime(), new ChoiceCollection());

        $collection->add($question);

        $this->assertSame('{}', $collection->jsonSerialize());
    }
}