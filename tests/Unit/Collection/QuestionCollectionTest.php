<?php declare(strict_types=1);

namespace Lfn\Oat\QuestionApi\Test\Collection;

use DateTime;
use Lfn\Oat\QuestionApi\Collection\QuestionCollection;
use Lfn\Oat\QuestionApi\DataObject\Question;
use Lfn\Oat\QuestionApi\Exception\EmptyCollectionException;
use Lfn\Oat\QuestionApi\Exception\InvalidPositionException;
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
        $question   = new Question('text', new DateTime());
        $collection->add($question);

        $items = $collection->getAll();

        self::assertSame([$question], $items);
    }

    /**
     * @test
     */
    public function shouldGetSingleItem(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question', new DateTime());
        $collection->add($question);

        $item = $collection->get(0);

        self::assertSame($question, $item);
    }

    /**
     * @test
     */
    public function shouldAddItem(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('question', new DateTime());

        $collection->add($question);

        $this->assertSame(1, $collection->count());
        $this->assertSame($question, $collection->get(0));
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfCollectionIsEmpty(): void
    {
        $collection = new QuestionCollection();

        $this->expectException(EmptyCollectionException::class);

        $collection->get(0);
    }

    /**
     * @test
     */
    public function shouldThrowExceptionIfItemDoesNotExits(): void
    {
        $collection = new QuestionCollection();
        $collection->add(new Question('text', new DateTime()));

        $this->expectException(InvalidPositionException::class);

        $collection->get(1);
    }

    /**
     * @test
     */
    public function shouldGetItemCount(): void
    {
        $collection = new QuestionCollection();
        $question   = new Question('text', new DateTime());

        $collection->add($question);

        $this->assertSame(1, $collection->count());
    }

    /**
     * @test
     */
    public function shouldSerializeToJson(): void
    {
        $dateTime   = DateTime::createFromFormat('d/m/Y H:i:s', '22/11/2019 00:00:00');
        $collection = new QuestionCollection();
        $question   = new Question('text', $dateTime);

        $collection->add($question);

        $expected = '[{"text":"text","createdAt":"2019-11-22T00:00:00.000000Z","choices":{}}]';

        $this->assertSame($expected, json_encode($collection->jsonSerialize()));
    }
}